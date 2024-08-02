<?php
require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Categorie';
$template['content'] = '';


require_once '../libs/db/Categorie.php';
$Categorie = new Categorie();


?>


<!--<h1>Gestione Categorie</h1>-->


<table width="100%" class="table-dati" >
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">&nbsp;</th>
<!--        <th>&nbsp;</th>-->
        <th scope="col">&nbsp;</th>
    </tr>
    
    <?php
    function print_righe_categorie( $managerSql , $id_categoria_padre, $livello ){
        $spaziatore='';
        for($s=0;$s<$livello;$s++){$spaziatore.='_';}
        $categorie = $managerSql->lista_categorie($id_categoria_padre);
        for($i=0; $i<count($categorie); $i++){
            $categoria = $categorie[$i];
            $categoria['descrizione'] = substr($categoria['descrizione'], 0, 100);
            echo "<tr id=\"c_{$categoria['id_categoria']}\">
                    <th scope=\"row\">{$categoria['id_categoria']}</th>
                    <td width=\"180\">$spaziatore [$livello] {$categoria['nome']}</td>
                    <td>{$categoria['descrizione']}</td>
                    <td><a class=\"bordernone\" href=\"edit_categoria.php?id={$categoria['id_categoria']}\" ><img src=\"../template/backend/media/image/modifica.png\" title=\"Modifica\" /></a></td>
               <!-- <td><a href=\"edit_ordine_prodotti.php?id={$categoria['id_categoria']}\" ><img src=\"../common/template/adm/img/documenti.png\" title=\"Modifica Ordine Prodotti\"/></a></td> -->
                    <td><a class=\"bordernone\" href=\"del_categoria.php?id={$categoria['id_categoria']}\" onclick=\"javascript: return confirm('Sei sicuro di voler eliminare la categoria?');\"><img src=\"../template/backend/media/image/elimina.png\" title=\"Elimina\"/></a></td>
                </tr>";
            print_righe_categorie($managerSql, $categoria['id_categoria'], $livello+1);
        }
    }
    
        
    print_righe_categorie($Categorie, 0, 1);
    ?>
  
</table>

<p>
    <a href="add_categoria.php">Aggiungi una Categoria</a>
</p>

<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>