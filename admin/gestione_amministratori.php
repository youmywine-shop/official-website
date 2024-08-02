<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Amministratori';
$template['content'] = '';

require_once '../libs/db/Amministratori.php';
$Amministratori = new Amministratori();

?>



<!--<h1>Elenco Amministratori</h1>-->


<table width="100%" class="admintab table-dati" >
    <tr>
        <th scope="col">Username</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
    </tr>


    <?php
    $lista_amministratori = $Amministratori->lista_amministratori();
    foreach ($lista_amministratori as $key => $amministratore) {
        echo "<tr>
                <td>{$amministratore['username']}</td>
                <td width=\"20\"><a class=\"bordernone\" href=\"edit_amministratore.php?id={$amministratore['id_amministratore']}\" ><img src=\"../template/backend/media/image/modifica.png\" title=\"Modifica\" /></a></td>
                <td width=\"20\"><a class=\"bordernone\" href=\"del_amministratore.php?id={$amministratore['id_amministratore']}\" onclick=\"javascript: return confirm('Sei sicuro di voler eliminare l\'amministratore?');\"><img src=\"../template/backend/media/image/elimina.png\" title=\"Elimina\" /></a></td>
              </tr>";
    }
    ?>
    
</table>

<style>
.admintab tr:nth-child(2) td a{display:none !important;}
.admintab tr:nth-child(2) td a img{display:none !important;}
</style>

<p>
    <a href="add_amministratore.php" >Aggiungi nuovo amministratore</a>
</p>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>