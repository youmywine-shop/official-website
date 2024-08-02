<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Locations';
$template['content'] = '';

require_once '../libs/db/Locations.php';
$Locations = new Locations();

?>



<!--<h1>Elenco Locations</h1>-->


<table width="100%" class="table-dati" >
  <tr>
    <th scope="col">Nome</th>
    <th scope="col">Costo spedizione</th>
    <th scope="col">&nbsp;</th>
    <th scope="col">&nbsp;</th>
  </tr>

    <?php
    $lista_locations = $Locations->lista_locations( array('id_location_padre'=>''));
    foreach ($lista_locations as $key => $location) {
        $location['spedizione'] = number_format($location['spedizione'], 2, '.', '');
        $name = $location['state'];
        $name .= (!empty($location['country'])) ? " - {$location['country']}" : '';
        $name .= (!empty($location['city'])) ? " - {$location['city']}" : '';
        echo "<tr>
                <td>{$name}</td>
                <td>&euro; {$location['spedizione']}</td>
                <td width=\"20\"><a class=\"bordernone\" href=\"edit_location.php?id={$location['id_location']}\" ><img src=\"../template/backend/media/image/modifica.png\" title=\"Modifica\" /></a></td>
                <td width=\"20\"><a class=\"bordernone\" href=\"del_location.php?id={$location['id_location']}\" onclick=\"javascript: return confirm('Sei sicuro di voler eliminare la location?');\"><img src=\"../template/backend/media/image/elimina.png\" title=\"Elimina\" /></a></td>
              </tr>";
        if($location['num_sublocations']){
            $sublocations = $Locations->lista_locations( array('id_location_padre'=>$location['id_location']));
            foreach ($sublocations as $sub_key => $sublocation) {
                $sublocation['spedizione'] = number_format($sublocation['spedizione'], 2, '.', '');
                echo "<tr>
                        <td>{$sublocation['state']} - {$sublocation['country']} - {$sublocation['city']}</td>
                        <td>&euro; {$sublocation['spedizione']}</td>
                        <td width=\"20\"><a class=\"bordernone\" href=\"edit_location.php?id={$sublocation['id_location']}\" ><img src=\"../template/backend/media/image/modifica.png\" title=\"Modifica\" /></a></td>
                        <td width=\"20\"><a class=\"bordernone\" href=\"del_location.php?id={$sublocation['id_location']}\" onclick=\"javascript: return confirm('Sei sicuro di voler eliminare la location?');\"><img src=\"../template/backend/media/image/elimina.png\" title=\"Elimina\" /></a></td>
                      </tr>";
            }
        }
    }
    ?>
    
</table>

<p>
    <a href="add_location.php" >Aggiungi nuova location</a>
</p>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>
