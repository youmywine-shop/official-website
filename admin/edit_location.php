<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Locations | Modifica';
$template['content'] = '';

require_once '../libs/carica_img.php';
require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Locations.php';
$Locations = new Locations();



if( empty($_GET['id']) ){
    header('Location: gestione_locations.php');
    exit();
}


$location = $Locations->get_location($_GET['id']);
if( !$location ){
    header('Location: error.php?code=11');
    exit();
}


$salvataggio_completato=0;
$error = array();

if(array_key_exists('salva', $_POST)){
    
    if(array_key_exists('id_location_padre', $_POST)){
        $location['id_location_padre'] = $_POST['id_location_padre'];
    }
    if( empty($_POST['state']) ){ $error[]='state'; }else{ $location['state'] = $_POST['state']; }
    if(array_key_exists('country', $_POST)){ $location['country'] = $_POST['country']; }
    if(array_key_exists('city', $_POST)){ $location['city'] = $_POST['city']; }
    if( empty($_POST['country']) Xor empty($_POST['city']) ){ $error[] = 'country'; $error[] = 'city'; }
    if(array_key_exists('cap', $_POST)){ $location['cap'] = $_POST['cap']; }
    $location['mostrainhome'] = !empty($_POST['mostrainhome']) ? intval($_POST['mostrainhome']) : '0';
    
    if( empty($_POST['spedizione']) ){ $error[]='spedizione'; }else{ $location['spedizione'] = $_POST['spedizione']; }
    
    if( !count($error) ){
        
        if( !$Locations->modifica_location($location) || !(( !array_key_exists('immagine', $_FILES) || ($_FILES['immagine']['size']==0)) || load_image('../images/img_locations/', $_FILES['immagine'], $location['id_location']) ) ){
            dbTransactions::transaction_rollback();
            header('Location: error.php?code=12');
            exit();
        }
        dbTransactions::transaction_commit();
        $salvataggio_completato=1;
        
    }
}
?>

<!--<h1>Modifica location</h1>-->

<?php
    include_once '../libs/helper/view_errors.php'; show_errors($error, TRUE);
    
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_locations.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_edit_location" action="<?= "{$_SERVER['PHP_SELF']}?id={$location['id_location']}" ?>" method="post" enctype="multipart/form-data" >
    
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
            <td></td>
            <td>
                <div style="width:240px; float: right; margin: 10px 0 10px 0;">
                    <p style="font-size:15px; line-height: 0px; margin-bottom: -7px;">Visuallizare in home ? </p>
                    <input type="checkbox" name="mostrainhome" id="mostrainhome" value="1" <?php echo $location['mostrainhome'] ? 'checked="checked"' : ''; ?> />
                </div>
            </td>
        </tr>
        <tr>
            <td><label class="inputlabel">Location Padre *</label></td>
            <td>
                <select class="select" name="id_location_padre" id="id_location_padre">
                    <option value=""> Nessuna </option>
                    <?php
                    $lista_locations = $Locations->lista_locations( array('id_location_padre'=>'') );
                    foreach ($lista_locations as $location_row) {
                        foreach ($location_row as $key => $value) {
                            $location_row[$key] = htmlspecialchars($value);
                        }
                        
                        $selected = ($location_row['id_location']==$location['id_location_padre'])? 'selected="selected"' : '';
                        echo "<option value=\"{$location_row['id_location']}\" $selected > {$location_row['state']} - {$location_row['country']} - {$location_row['city']} </option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label class="inputlabel">State *</label></td>
            <td><input type="text" name="state" id="state" value="<?php echo htmlspecialchars($location['state']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Country</label></td>
            <td><input type="text" name="country" id="country" value="<?php echo htmlspecialchars($location['country']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">City</label></td>
            <td><input type="text" name="city" id="city" value="<?php echo htmlspecialchars($location['city']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">CAP</label></td>
            <td><textarea name="cap" id="cap"><?php echo htmlspecialchars($location['cap']); ?></textarea></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Costo spedizione *</label></td>
            <td><input type="text" name="spedizione" id="spedizione" value="<?php echo htmlspecialchars($location['spedizione']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Immagine</label></td>
            <td><div class="inputlabel"><input type="file" name="immagine" id="immagine" /></div></td>
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