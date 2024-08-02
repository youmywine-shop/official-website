<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Prodotti';
$template['content'] = '';

require_once '../libs/db/Prodotti.php';
require_once '../libs/db/Categorie.php';
require_once '../libs/db/Locations.php';
$Prodotti = new Prodotti();
$Categorie = new Categorie();
$Locations = new Locations();

?>

<!--<h1>Elenco Prodotti</h1>-->

<table width="100%" class="table-dati" >
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Location</th>
        <th scope="col">&nbsp;</th>
        <th scope="col">&nbsp;</th>
    </tr>
    
    <?php
    $lista_prodotti = $Prodotti->lista_prodotti();
    foreach ($lista_prodotti as $key => $prodotto) {
        $categoria = $Categorie->get_categoria($prodotto['id_categoria']);
        $location = $Locations->get_location($prodotto['id_location']);
        $prodotto['prezzo'] = number_format($prodotto['prezzo'], 2, '.', '');
        echo "<tr>
                <td>{$prodotto['nome']}</td>
                <td>&euro; {$prodotto['prezzo']}</td>
                <td>{$categoria['nome']}</td>
                <td>{$location['state']}, {$location['country']}, {$location['city']}</td>
                <td width=\"20\"><a class=\"bordernone\" href=\"edit_prodotto.php?id={$prodotto['id_prodotto']}\" ><img src=\"../template/backend/media/image/modifica.png\" title=\"Modifica\" /></a></td>
                <td width=\"20\"><a class=\"bordernone\" href=\"del_prodotto.php?id={$prodotto['id_prodotto']}\" onclick=\"javascript: return confirm('Sei sicuro di voler eliminare il prodotto?');\"><img src=\"../template/backend/media/image/elimina.png\" title=\"Elimina\" /></a></td>
              </tr>";
    }
    ?>
    
</table>


<p>
    <a href="add_prodotto.php" >Aggiungi nuovo prodotto</a>
</p>

<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>