<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Prodotti | Modifica';
$template['content'] = '';

require_once '../libs/carica_img.php';
require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Prodotti.php';
$Prodotti = new Prodotti();



if( empty($_GET['id']) ){
    header('Location: gestione_prodotti.php');
    exit();
}


$prodotto = $Prodotti->get_prodotto($_GET['id']);
if( !$prodotto ){
    header('Location: error.php?code=15');
    exit();
}


$salvataggio_completato=0;
$error = array();

if(array_key_exists('salva', $_POST)){
    
    if( empty($_POST['nome']) ){ $error[]='nome'; }else{ $prodotto['nome'] = $_POST['nome']; }
    if( empty($_POST['descrizione']) ){ $error[]='descrizione'; }else{ $prodotto['descrizione'] = $_POST['descrizione']; }
    if( empty($_POST['prezzo']) || !floatval($_POST['prezzo']) ){ $error[]='prezzo'; }else{ $prodotto['prezzo'] = $_POST['prezzo']; }
    if( empty($_POST['id_categoria']) ){ $error[]='id_categoria'; }else{ $prodotto['id_categoria'] = $_POST['id_categoria']; }
    if( empty($_POST['id_location']) ){ $error[]='id_location'; }else{ $prodotto['id_location'] = $_POST['id_location']; }
    
    if( !count($error) ){
        
        if( !$Prodotti->modifica_prodotto($prodotto) || !(( !array_key_exists('immagine', $_FILES) || ($_FILES['immagine']['size']==0)) || load_image('../images/img_prodotti/', $_FILES['immagine'], $prodotto['id_prodotto']) ) ){
            dbTransactions::transaction_rollback();
            header('Location: error.php?code=16');
            exit();
        }
        dbTransactions::transaction_commit();
        $salvataggio_completato=1;
        
    }
}
?>



<!--<h1>Modifica prodotto</h1>-->

<?php
    include_once '../libs/helper/view_errors.php'; show_errors($error, TRUE);
    
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_prodotti.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_edit_prodotto" action="<?= "{$_SERVER['PHP_SELF']}?id={$prodotto['id_prodotto']}" ?>" method="post" enctype="multipart/form-data" >
    
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nome Prodotto *</label></td>
            <td><input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($prodotto['nome']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Descrizione *</label></td>
            <td><textarea name="descrizione" id="descrizione"><?php echo htmlspecialchars($prodotto['descrizione']); ?></textarea></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Prezzo *</label></td>
            <td><input type="text" name="prezzo" id="prezzo" value="<?php echo htmlspecialchars($prodotto['prezzo']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Categoria *</label></td>
            <td>
                <select class="select" name="id_categoria" id="id_categoria">
                    <option value="0">--- Selezionare una categoria ---</option>
                    <?php
                    require_once '../libs/db/Categorie.php';
                    $Categorie = new Categorie();
                    include_once '../libs/helper/recursive_categorie.php';
                    print_option_categorie($Categorie, 0, 0, $prodotto['id_categoria']);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="inputlabel">Locations *</label></td>
            <td>
                <select class="select" name="id_location" id="id_location">
                    <option value="0">--- Selezionare una location ---</option>
                    <?php
                    require_once '../libs/db/Locations.php';
                    $Locations = new Locations();
                    $lista_locations = $Locations->lista_locations();
                    foreach ($lista_locations as $location) {
                        if($location['num_sublocations']){
                            continue;
                        }
                        $selected = ( $location['id_location']==$prodotto['id_location']) ? 'selected="selected"' : '';
                        $nome = "{$location['state']}, {$location['country']}, {$location['city']}";
                        echo "<option value=\"{$location['id_location']}\" $selected >".htmlspecialchars($nome)."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="inputlabel">Immagine</label></td>
            <td><div class="wrap_inputfile"><input type="file" name="immagine" id="immagine" /></div></td>
        </tr>
    </table>
    
    <p>
        <button type="submit" name="salva" id="salva">Salva Modifiche</button>
    </p>
    
</form>

<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>
