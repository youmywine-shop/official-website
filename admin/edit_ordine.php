<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Ordini | Modifica';
$template['content'] = '';


require_once '../libs/db/Ordini.php';
$Ordini = new Ordini();


$stati = array();
$stati['IN_ATTESA']= 'IN ATTESA';
$stati['PAGATO']= 'PAGATO';
$stati['SPEDITO']= 'SPEDITO';
$stati['ANNULLATO']= 'ANNULLATO';



$id_ordine = !empty($_GET['id']) ? $_GET['id'] : '';
$ordine = $Ordini->get_ordine($id_ordine);
if(!$ordine){
    header('Location: error.php?code=22');
    exit();
}

$ordine['totale'] = number_format($ordine['costo_prodotto']+$ordine['costo_spedizione'], 2, '.', '');


$salvataggio_completato=FALSE;
$error = array();

if(array_key_exists('salva', $_POST)){
    
    if(empty($_POST['stato_ordine']) || !array_key_exists($_POST['stato_ordine'], $stati)){ $error[]='stato_ordine'; }else{ $ordine['stato_ordine']=$_POST['stato_ordine']; }
    
    if( !count($error) ){
        if(!$Ordini->modifica_ordine($ordine)){
            header('Location: error.php?code=23');
            exit();
        }
        $salvataggio_completato=TRUE;
    }
}



?>


<!--<h1>Modifica Ordine</h1>-->

<?php
    include_once '../libs/helper/view_errors.php'; show_errors($error, TRUE);
    
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_ordini.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_edit_ordine" action="<?= "{$_SERVER['PHP_SELF']}?id={$ordine['id_ordine']}" ?>" method="post" >
    
    <h4>Prodotto</h4>
    <br />
    <table class="table-dati" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>Prodotto</td> 
            <td><?php echo htmlspecialchars($ordine['nome_prodotto']); ?></td>
        </tr>
        <tr>
            <td>Biglietto da inviare</td> 
            <td><?php echo str_replace("\n", '<br/>', htmlspecialchars($ordine['biglietto'])); ?></td>
        </tr>
        <tr>
            <td>Data di spedizione</td> 
            <td><?php echo htmlspecialchars(date('d/m/Y',  strtotime($ordine['data_spedizione']))); ?></td>
        </tr>
        <tr>
            <td>Parte del giorno</td> 
            <td><?php echo htmlspecialchars($ordine['sliceofday']); ?></td>
        </tr>
    </table>
    
    <br /><br />
    <h4>Mittente</h4>
    <br />
    <table class="table-dati" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>Nome</td> 
            <td><?php echo htmlspecialchars($ordine['nome']); ?></td>
        </tr>
        <tr>
            <td>Cognome</td> 
            <td><?php echo htmlspecialchars($ordine['cognome']); ?></td>
        </tr>
        <tr>
            <td>Telefono</td> 
            <td><?php echo htmlspecialchars($ordine['telefono']); ?></td>
        </tr>
        <tr>
            <td>Email</td> 
            <td><?php echo htmlspecialchars($ordine['email']); ?></td>
        </tr>
    </table>

    <br /><br />
    <h4>Fatturazione</h4>
    <br />
    <table class="table-dati" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>Richiesta fatturazione</td>
            <td><?php echo $ordine['invoice_details'] ? 'Si' : 'No'; ?></td>
        </tr>
        <tr>
            <td>Agency Name</td> 
            <td><?php echo htmlspecialchars($ordine['agency_name']); ?></td>
        </tr>
        <tr>
            <td>Agency Address</td> 
            <td><?php echo htmlspecialchars($ordine['agency_address']); ?></td>
        </tr>
        <tr>
            <td>Agency Code</td> 
            <td><?php echo htmlspecialchars($ordine['agency_code']); ?></td>
        </tr>
    </table>

    <br /><br />    
    <h4>Destinatario</h4>
    <br />
    <table class="table-dati" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>Nome</td> 
            <td><?php echo htmlspecialchars($ordine['nome_sped']); ?></td>
        </tr>
        <tr>
            <td>Cognome</td> 
            <td><?php echo htmlspecialchars($ordine['cognome_sped']); ?></td>
        </tr>
        <tr>
            <td>Telefono</td> 
            <td><?php echo htmlspecialchars($ordine['telefono_sped']); ?></td>
        </tr>
        <tr>
            <td>State</td> 
            <td><?php echo htmlspecialchars($ordine['state_sped']); ?></td>
        </tr>
        <tr>
            <td>Country</td> 
            <td><?php echo htmlspecialchars($ordine['country_sped']); ?></td>
        </tr>
        <tr>
            <td>City</td> 
            <td><?php echo htmlspecialchars($ordine['city_sped']); ?></td>
        </tr>
        <tr>
            <td>CAP</td> 
            <td><?php echo htmlspecialchars($ordine['cap_sped']); ?></td>
        </tr>
        <tr>
            <td>Address</td> 
            <td><?php echo htmlspecialchars($ordine['address_sped']); ?></td>
        </tr>
    </table>
    
    <br /><br />
    <h4>Costi</h4>
    <br />
    <table class="table-dati" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>Costo prodotto</td> 
            <td>&euro; <?php echo number_format($ordine['costo_prodotto'],2,'.',''); ?></td>
        </tr>
        <tr>
            <td>Costo spedizione</td> 
            <td>&euro; <?php echo number_format($ordine['costo_spedizione'],2,'.',''); ?></td>
        </tr>
        <tr>
            <td>Totale</td> 
            <td>&euro; <?php echo htmlspecialchars($ordine['totale']); ?></td>
        </tr>
        
        <tr>
            <td>Stato ordine</td> 
            <td>
                <select class="select" name="stato_ordine" id="stato_ordine">
                    <?php
                    foreach ($stati as $key => $txt) {
                        $selected = ($key == $ordine['stato_ordine']) ? 'selected="selected"' : '';
                        echo "<option value=\"$key\" $selected >$txt</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>N.Ordine</td>
            <td>
                <?php echo $ordine['id_ordine']; ?>
            </td>
        </tr>
        <tr>
            <td>Data Creazione Ordine</td>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($ordine['data_ordine'])) ; ?>
            </td>
        </tr>
    </table>
    
    <br /><br />

    <p>
        <input type="submit" name="salva" id="salva" value="Salva Modifiche" />
    </p>
</form>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>