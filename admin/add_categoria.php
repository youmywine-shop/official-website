<?php
require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Categorie | Aggiungi';
$template['content'] = '';

require_once '../libs/carica_img.php';
require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Categorie.php';
$categorie = new Categorie();


$categoria = array();
$categoria['nome'] = '';
$categoria['descrizione'] = '';
$categoria['special'] = '0';
$categoria['id_categoria_padre'] = '';


$error = array();

if(array_key_exists('aggiungi', $_POST)){
    if( empty($_POST['nome']) ){ $error[]='nome'; }else{ $categoria['nome'] = $_POST['nome']; }
    $categoria['descrizione'] = (!empty($_POST['descrizione'])) ? $_POST['descrizione'] : '';
    $categoria['special'] = (!empty($_POST['special'])) ? $_POST['special'] : '0';
    if( !array_key_exists('livello', $_POST) ){ $error[]='livello'; }else{ $categoria['id_categoria_padre'] = $_POST['livello']; }
    
    if( !count($error) ){
        //aggiungi categoria
        
        dbTransactions::start_transaction();
        
        $id_categoria = $categorie->aggiungi_categoria($categoria);
        //se il database è stato aggiornato e il file non è stato inviato oppure è arrivato vuoto oppure è arrivato ed è stato possibile salvarlo
        if( $id_categoria && (( !array_key_exists('immagine', $_FILES) || ($_FILES['immagine']['size']==0)) || load_image('../images/img_categorie/', $_FILES['immagine'], $id_categoria) ) ){
            dbTransactions::transaction_commit();
            header('Location: gestione_categorie.php');
            exit();
        }else{
            dbTransactions::transaction_rollback();
            header('Location: error.php?code=6');
            exit();
        }
    }
}


$sel_special = array('0'=>'', '1'=>'');
foreach ($sel_special as $key => $value) {
    if($key==$categoria['special']){ $sel_special[$key] = 'selected="selected"'; }
}
?>

<!--<h1>Aggiungi nuova categoria</h1>-->

<?php include_once '../libs/helper/view_errors.php'; show_errors($error, TRUE); ?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_categorie.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_add_categoria" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >

    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nome Categoria *</label></td>
            <td><input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($categoria['nome']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Descrizione</label></td>
            <td><textarea name="descrizione" id="descrizione" cols="45" rows="5"><?php echo htmlspecialchars($categoria['descrizione']); ?></textarea></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Special *</label></td>
            <td>
                <select class="select" id="special" name="special">
                    <option value="0" <?= $sel_special['0'] ?> >NO</option>
                    <option value="1" <?= $sel_special['1'] ?> >SI</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="inputlabel">Livello *</label></td>
            <td>
                <select class="select" name="livello" id="livello">
                    <option value="">[0] - Primo Livello</option>
                    <?php
                    require_once '../libs/helper/recursive_categorie.php';
                    print_option_categorie($categorie, 0, 1);
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="title"><label class="inputlabel">Immagine</label></td>
            <td><div class="wrap_inputfile"><input type="file" name="immagine" id="immagine" /></div></td>
        </tr>
    </table>
    
    <p>
        <button type="submit" name="aggiungi" id="aggiungi">Aggiungi Categoria</button>
    </p>
    
</form>

<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>