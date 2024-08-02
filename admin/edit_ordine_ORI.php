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
            <td><label class="inputlabel">Prodotto</label></td> 
            <td><?php echo htmlspecialchars($ordine['nome_prodotto']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Biglietto da inviare</label></td> 
            <td><?php echo str_replace("\n", '<br/>', htmlspecialchars($ordine['biglietto'])); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Data di spedizione</label></td> 
            <td><?php echo htmlspecialchars(date('d/m/Y',  strtotime($ordine['data_spedizione']))); ?></td>
        </tr>
    </table>
    
    <br /><br />
    <h4>Mittente</h4>
    <br />
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nome</label></td> 
            <td><?php echo htmlspecialchars($ordine['nome']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Cognome</label></td> 
            <td><?php echo htmlspecialchars($ordine['cognome']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Telefono</label></td> 
            <td><?php echo htmlspecialchars($ordine['telefono']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Email</label></td> 
            <td><?php echo htmlspecialchars($ordine['email']); ?></td>
        </tr>
    </table>

    <br /><br />
    <h4>Fatturazione</h4>
    <br />
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Agency Name</label></td> 
            <td><?php echo htmlspecialchars($ordine['agency_name']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Agency Address</label></td> 
            <td><?php echo htmlspecialchars($ordine['agency_address']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Agency Code</label></td> 
            <td><?php echo htmlspecialchars($ordine['agency_code']); ?></td>
        </tr>
    </table>

    <br /><br />    
    <h4>Destinatario</h4>
    <br />
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nome</label></td> 
            <td><?php echo htmlspecialchars($ordine['nome_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Cognome</label></td> 
            <td><?php echo htmlspecialchars($ordine['cognome_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Telefono</label></td> 
            <td><?php echo htmlspecialchars($ordine['telefono_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">State</label></td> 
            <td><?php echo htmlspecialchars($ordine['state_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Country</label></td> 
            <td><?php echo htmlspecialchars($ordine['country_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">City</label></td> 
            <td><?php echo htmlspecialchars($ordine['city_sped']); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Address</label></td> 
            <td><?php echo htmlspecialchars($ordine['address_sped']); ?></td>
        </tr>
    </table>
    
    <br /><br />
    <h4>Costi</h4>
    <br />
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Costo prodotto</label></td> 
            <td>&euro; <?php echo number_format($ordine['costo_prodotto'],2,'.',''); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Costo spedizione</label></td> 
            <td>&euro; <?php echo number_format($ordine['costo_spedizione'],2,'.',''); ?></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Totale</label></td> 
            <td>&euro; <?php echo htmlspecialchars($ordine['totale']); ?></td>
        </tr>
        
        <tr>
            <td><label class="inputlabel">Stato ordine</label></td> 
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
    </table>

    <p>
        <input type="submit" name="salva" id="salva" value="Salva Modifiche" />
    </p>
</form>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>