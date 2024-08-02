<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Frasi | Modifica';
$template['content'] = '';


require_once '../libs/db/Impostazioni.php';
$Impostazioni = new Impostazioni();


/*
 * FORHIMHER
 * FORAMAZE
 * FOREXPERT
 * SUPERIOR
 * FORFRIENDS
 * FORFAMILY
 * FORLOVE
 * FORBUSSINESS
 * 
 */

$impostazione_FORHIMHER = $Impostazioni->get_impostazione('FORHIMHER');
$impostazione_FORAMAZE = $Impostazioni->get_impostazione('FORAMAZE');
$impostazione_FOREXPERT = $Impostazioni->get_impostazione('FOREXPERT');
$impostazione_SUPERIOR = $Impostazioni->get_impostazione('SUPERIOR');
$impostazione_FORFRIENDS = $Impostazioni->get_impostazione('FORFRIENDS');
$impostazione_FORFAMILY = $Impostazioni->get_impostazione('FORFAMILY');
$impostazione_FORLOVE = $Impostazioni->get_impostazione('FORLOVE');
$impostazione_FORBUSSINESS = $Impostazioni->get_impostazione('FORBUSSINESS');


$salvataggio_completato = 0;

if (array_key_exists('salva_forhimher', $_POST)) {
    $impostazione_FORHIMHER['valore'] = array_key_exists('forhimher', $_POST)? $_POST['forhimher'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORHIMHER)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_foramaze', $_POST)) {
    $impostazione_FORAMAZE['valore'] = array_key_exists('foramaze', $_POST)? $_POST['foramaze'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORAMAZE)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_forexpert', $_POST)) {
    $impostazione_FOREXPERT['valore'] = array_key_exists('forexpert', $_POST)? $_POST['forexpert'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FOREXPERT)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_superior', $_POST)) {
    $impostazione_SUPERIOR['valore'] = array_key_exists('superior', $_POST)? $_POST['superior'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_SUPERIOR)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_forfriends', $_POST)) {
    $impostazione_FORFRIENDS['valore'] = array_key_exists('forfriends', $_POST)? $_POST['forfriends'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORFRIENDS)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_forfamily', $_POST)) {
    $impostazione_FORFAMILY['valore'] = array_key_exists('forfamily', $_POST)? $_POST['forfamily'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORFAMILY)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_forlove', $_POST)) {
    $impostazione_FORLOVE['valore'] = array_key_exists('forlove', $_POST)? $_POST['forlove'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORLOVE)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
} elseif (array_key_exists('salva_forbussiness', $_POST)) {
    $impostazione_FORBUSSINESS['valore'] = array_key_exists('forbussiness', $_POST)? $_POST['forbussiness'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_FORBUSSINESS)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
}

?>


<!--<h1>Frasi consigliate</h1>-->


    <?php
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
    ?>


    <form name="frm_forhimher" id="frm_forhimher" method="post" action="edit_frasi.php">
        <h4>Frase For Him & Her</h4>
        <p>
<!--            <input type="text" name="forhimher" id="forhimher" value="<?php echo htmlspecialchars($impostazione_FORHIMHER['valore']); ?>" />-->
            <textarea name="forhimher" id="forhimher"><?php echo htmlspecialchars($impostazione_FORHIMHER['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forhimher" id="salva_forhimher" value="Salva" />
        </p>
    </form>

    
    <hr/>


    <form name="frm_foramaze" id="frm_foramaze" method="post" action="edit_frasi.php">
        <h4>Frase For Amaze</h4>
        
        <p>
            <!--<input type="text" name="foramaze" id="foramaze" value="<?php echo htmlspecialchars($impostazione_FORAMAZE['valore']); ?>" />-->
            <textarea name="foramaze" id="foramaze"><?php echo htmlspecialchars($impostazione_FORAMAZE['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_foramaze" id="salva_foramaze" value="Salva" />
        </p>
    </form>
        
        
    <hr/>


    <form name="frm_forexpert" id="frm_forexpert" method="post" action="edit_frasi.php">
        <h4>Frase For Expert</h4>
        
        <p>
            <!--<input type="text" name="forexpert" id="forexpert" value="<?php echo htmlspecialchars($impostazione_FOREXPERT['valore']); ?>" />-->
            <textarea name="forexpert" id="forexpert"><?php echo htmlspecialchars($impostazione_FOREXPERT['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forexpert" id="salva_forexpert" value="Salva" />
        </p>
    </form>
    
    
    <hr/>


    <form name="frm_superior" id="frm_superior" method="post" action="edit_frasi.php">
        <h4>Frase Superior</h4>
        
        <p>
            <!--<input type="text" name="superior" id="superior" value="<?php echo htmlspecialchars($impostazione_SUPERIOR['valore']); ?>" />-->
            <textarea name="superior" id="superior"><?php echo htmlspecialchars($impostazione_SUPERIOR['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_superior" id="salva_superior" value="Salva" />
        </p>
    </form>
    
    
    <hr/>


    <form name="frm_forfriends" id="frm_forfriends" method="post" action="edit_frasi.php">
        <h4>Frase For Friends</h4>
        
        <p>
<!--            <input type="text" name="forfriends" id="forfriends" value="<?php echo htmlspecialchars($impostazione_FORFRIENDS['valore']); ?>" />-->
            <textarea name="forfriends" id="forfriends"><?php echo htmlspecialchars($impostazione_FORFRIENDS['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forfriends" id="salva_forfriends" value="Salva" />
        </p>
    </form>
    
    
    <hr/>


    <form name="frm_forfamily" id="frm_forfamily" method="post" action="edit_frasi.php">
        <h4>Frase For Family</h4>
        
        <p>
            <!--<input type="text" name="forfamily" id="forfamily" value="<?php echo htmlspecialchars($impostazione_FORFAMILY['valore']); ?>" />-->
            <textarea name="forfamily" id="forfamily"><?php echo htmlspecialchars($impostazione_FORFAMILY['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forfamily" id="salva_forfamily" value="Salva" />
        </p>
    </form>
    
    
    <hr/>


    <form name="frm_forlove" id="frm_forlove" method="post" action="edit_frasi.php">
        <h4>Frase For Love</h4>
        
        <p>
            <!--<input type="text" name="forlove" id="forlove" value="<?php echo htmlspecialchars($impostazione_FORLOVE['valore']); ?>" />-->
            <textarea name="forlove" id="forlove"><?php echo htmlspecialchars($impostazione_FORLOVE['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forlove" id="salva_forlove" value="Salva" />
        </p>
    </form>
    
    
    <hr/>


    <form name="frm_forbussiness" id="frm_forbussiness" method="post" action="edit_frasi.php">
        <h4>Frase For Bussiness</h4>
        
        <p>
            <!--<input type="text" name="forbussiness" id="forbussiness" value="<?php echo htmlspecialchars($impostazione_FORBUSSINESS['valore']); ?>" />-->
            <textarea name="forbussiness" id="forbussiness"><?php echo htmlspecialchars($impostazione_FORBUSSINESS['valore']); ?></textarea>
            <br/>
            <input type="submit" name="salva_forbussiness" id="salva_forbussiness" value="Salva" />
        </p>
    </form>
    
    
    
        
<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>