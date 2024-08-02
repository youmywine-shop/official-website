<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Utenti';
$template['content'] = '';

require_once '../libs/db/Utenti.php';
$Utenti = new Utenti();


$params = array();
if(array_key_exists('cerca', $_GET)){
    $params['testo'] = (!empty($_GET['txt_cerca'])) ? $_GET['txt_cerca'] : '';
}


$pagina_attuale = array_key_exists('pagina', $_GET) ? (int) $_GET['pagina'] : 0;
$elementi_per_pagina = 20;
$inizio = $elementi_per_pagina * $pagina_attuale;


$lista_utenti = $Utenti->lista_utenti($params);
$num_elementi = count($lista_utenti);
if( ($inizio>=$num_elementi) && $inizio )
    exit("accesso ad area non consentito... numero pagina non valido");
$lista_utenti = $Utenti->lista_utenti($params, $inizio, $elementi_per_pagina);



?>

<script type="text/javascript">
    function cambia_pagina(){
        txt_cerca='<?php echo (!empty($params['testo']))? "&txt_cerca={$params['testo']}" : ''; ?>';
        cerca='<?php echo (array_key_exists('cerca', $_GET)) ? '&cerca=Cerca' : ''; ?>';
    
        elemReg = document.getElementById('pagine');
        pagina = elemReg[elemReg.selectedIndex].value;
        window.location.href ="<?php echo "{$_SERVER['PHP_SELF']}?pagina="; ?>"+pagina+txt_cerca+cerca;
    }
</script>



<!--<h1>Elenco Utenti</h1>-->

<form name="form_cerca" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div id="search">
        CERCA:
        <input type="text" name="txt_cerca" id="txt_cerca" value="<?php echo (!empty($params['testo']))? $params['testo'] : ''; ?>" />
        <input type="submit" name="cerca" value="&nbsp;" />
    </div>
</form>

<hr class="after_search"/>

<table width="100%" class="usertab table-dati" >
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Cognome</th>
        <th scope="col">Email</th>
        <th scope="col">State</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
    </tr>
    
    <?php
    
    foreach ($lista_utenti as $utente) {
        echo <<<UTENTE
                <tr>
                    <td>{$utente['nome']}</td>
                    <td>{$utente['cognome']}</td>
                    <td>{$utente['email']}</td>
                    <td>{$utente['state']}</td>
                    <td width="20"><a class="bordernone" href="edit_utente.php?id={$utente['id_utente']}"><img src="../template/backend/media/image/modifica.png" title="Modifica" /></a></td>
                    <td width="20"><a class="bordernone" href="del_utente.php?id={$utente['id_utente']}" onclick="javascript: return confirm('Sei sicuro di voler eliminare l\'utente ?');" ><img src="../template/backend/media/image/elimina.png" title="Elimina" /></a></td>
                </tr>
UTENTE;
    }
    ?>

</table>

<style>
.usertab tr:nth-child(2) td a{display:none !important;}
.usertab tr:nth-child(2) td a img{display:none !important;}
</style>

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

    