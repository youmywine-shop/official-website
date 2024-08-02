<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Ordini';
$template['content'] = '';

require_once '../libs/db/Ordini.php';
$Ordini = new Ordini();

$stati = array();
$stati['IN_ATTESA']= 'IN ATTESA';
$stati['PAGATO']= 'PAGATO';
$stati['SPEDITO']= 'SPEDITO';
$stati['ANNULLATO']= 'ANNULLATO';




$params = array();
if(array_key_exists('cerca', $_GET)){
    $params['testo'] = (!empty($_GET['txt_cerca'])) ? $_GET['txt_cerca'] : '';
    $params['data_inizio'] = (!empty($_GET['data_i_cerca'])) ? preg_replace('#^(\d{2})-(\d{2})-(\d{4})$#', '$3-$2-$1', $_GET['data_i_cerca']) : '';
    $params['data_fine'] = (!empty($_GET['data_f_cerca'])) ? preg_replace('#^(\d{2})-(\d{2})-(\d{4})$#', '$3-$2-$1', $_GET['data_f_cerca']) : '';
    $params['stato_ordine'] = (!empty($_GET['stato_cerca'])) ? $_GET['stato_cerca'] : '';
}



$pagina_attuale = array_key_exists('pagina', $_GET) ? (int) $_GET['pagina'] : 0;
$elementi_per_pagina = 20;
$inizio = $elementi_per_pagina * $pagina_attuale;


$lista_ordini = $Ordini->lista_ordini($params);
$num_elementi = count($lista_ordini);
if( ($inizio>=$num_elementi) && $inizio )
    exit("accesso ad area non consentito... numero pagina non valido");
$lista_ordini = $Ordini->lista_ordini($params, $inizio, $elementi_per_pagina);

?>

<script type="text/javascript">

    function cambia_pagina(){
        txt_cerca='<?php echo (!empty($params['testo']))? "&txt_cerca={$params['testo']}" : ''; ?>';
        data_i_cerca='<?php echo (!empty($params['data_inizio']))? "&data_i_cerca=".date('d-m-Y', strtotime($params['data_inizio'])) : ''; ?>';
        data_f_cerca='<?php echo (!empty($params['data_fine']))? "&data_f_cerca=".date('d-m-Y', strtotime($params['data_fine'])) : ''; ?>';
        stato_cerca='<?php echo (!empty($params['stato_ordine']))? "&stato_cerca={$params['stato_ordine']}" : ''; ?>';
        cerca='<?php echo (array_key_exists('cerca', $_GET)) ? '&cerca=Cerca' : ''; ?>';
        
        elemReg = document.getElementById('pagine');
        pagina = elemReg[elemReg.selectedIndex].value;
        window.location.href ="<?php echo "gestione_ordini.php?pagina="; ?>"+pagina + txt_cerca + data_i_cerca + data_f_cerca + stato_cerca + cerca ;
    }
    
    $(function() {
        $("#data_i_cerca").datepicker({ dateFormat: "dd-mm-yy" });
        $("#data_f_cerca").datepicker({ dateFormat: "dd-mm-yy" });
    });
</script>



<!--<h1>Elenco Ordini</h1>-->


<form id="nav_ordini" method="GET" action="gestione_ordini.php" >
    <div id="search">
        Testo <input type="text" name="txt_cerca" id="txt_cerca" value="<?php echo (!empty($params['testo'])) ? $params['testo'] : ''; ?>" />  
        Da <input type="text" name="data_i_cerca" id="data_i_cerca" value="<?php echo (!empty($params['data_inizio'])) ? date('d-m-Y', strtotime($params['data_inizio'])) : ''; ?>" /> 
        A <input type="text" name="data_f_cerca" id="data_f_cerca" value="<?php echo (!empty($params['data_fine'])) ? date('d-m-Y', strtotime($params['data_fine'])) : ''; ?>" />
        Stato Ordine <select class="select" style="width: auto;" name="stato_cerca" id="stato_cerca" >
                        <option value="" >QUALSIASI</option>
                            <?php
                            foreach ($stati as $key => $txt) {
                                $selected = (!empty($params['stato_ordine']) && ($key == $params['stato_ordine'])) ? 'selected="selected"' : '';
                                echo "<option value=\"$key\" $selected >$txt</option>";
                            }
                            ?>
                        </select>
        <input type="submit" name="cerca" value="&nbsp;" />
    </div>
</form>

<hr class="after_search"/>

<table width="100%" class="table-dati" >
    <tr>
        <th scope="col">N.Ordine</th>
        <th scope="col">Mittente</th>
        <th scope="col">Destinatario</th>
        <th scope="col">Data Spedizione</th>
        <th scope="col">Totale</th>
        <th scope="col">Data creazione</th>
        <th scope="col">Stato Ordine</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
    </tr>
    
    <?php
       
    foreach ($lista_ordini as $ordine) {
        $ordine['totale'] = number_format($ordine['costo_prodotto']+$ordine['costo_spedizione'], 2, '.', '');
        $ordine['data_spedizione'] = htmlspecialchars(date('d/m/Y',  strtotime($ordine['data_spedizione'])));
        $data_creazione = date('d-m-Y H:i:s', strtotime($ordine['data_ordine']));
        echo <<<ORDINE
                <tr>
                    <td>{$ordine['id_ordine']}</td>
                    <td>{$ordine['cognome']} {$ordine['nome']}<br/>{$ordine['email']}</td>
                    <td>{$ordine['cognome_sped']} {$ordine['nome_sped']}<br/>
                        {$ordine['state_sped']} - {$ordine['country_sped']} - {$ordine['city_sped']} - {$ordine['cap_sped']}<br/>
                        {$ordine['address_sped']}</td>
                    <td>{$ordine['data_spedizione']}</td>
                    <td>&euro; {$ordine['totale']}</td>
                    <td>$data_creazione</td>
                    <td>{$ordine['stato_ordine']}</td>
                    <td width="20"><a class="bordernone" href="edit_ordine.php?id={$ordine['id_ordine']}"><img src="../template/backend/media/image/modifica.png" title="Modifica" /></a></td>
                    <td width="20"><a class="bordernone" href="del_ordine.php?id={$ordine['id_ordine']}" onclick="javascript: return confirm('Sei sicuro di voler eliminare l\'ordine ?');" ><img src="../template/backend/media/image/elimina.png" title="Elimina" /></a></td>
                </tr>
ORDINE;
    }
    
    ?>

</table>


<?php
    if ( $num_elementi>0 && $num_elementi>$elementi_per_pagina ){
        $pagina=0;
        echo 'Pagine: <select name="pagine" id="pagine" onchange="javascript: cambia_pagina();" >';
        while($num_elementi>0){ //ciclo per creare una 'option' per ogni paginaù
            echo "<option value=\"$pagina\"";
            if( $pagina_attuale==$pagina){
                echo 'selected="selected"'; //verrà selezionata la pagina attuale
            }
            $pagina++;
            echo " >$pagina</option>";

            $num_elementi -= $elementi_per_pagina;
        }
        echo '</select>';
    }
?>



<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>