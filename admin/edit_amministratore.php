<?php
include_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Amministratori | Modifica';
$template['content'] = '';


require_once '../libs/db/Amministratori.php';
$Amministratori = new Amministratori();

if( empty($_GET['id']) ){
    header('Location: index.php');
    exit();
}


$amministratore = $Amministratori->get_amministratore($_GET['id']);
if( !$amministratore ){
    header('Location: error.php?code=3');
    exit();
}

$salvataggio_completato=0;
$error = array();

if(array_key_exists('salva', $_POST)){
    if( empty($_POST['username']) ){ $error[]='username'; }else{ $amministratore['username'] = $_POST['username']; }
    if( empty($_POST['password']) || empty($_POST['password2']) || strcmp($_POST['password'], $_POST['password2']) ){ $error[] = 'password'; $error[]='password2'; }else{ $amministratore['password']=$_POST['password']; }
    
    if( !count($error) ){
        if( ! $Amministratori->modifica_amministratore($amministratore) ){
            header('Location: error.php?code=4');
            exit();
        }
        $salvataggio_completato=1;
    }
}

?>



<!--<h1>Modifica credenziali amministratore</h1>-->



<?php
require '../libs/helper/view_errors.php';
show_errors($error, TRUE);
?>
    
<?php
if($salvataggio_completato){
    echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
}
?>
    
    

<form id="frm_edit_amministratore" method="post" action="<?= "{$_SERVER['PHP_SELF']}?id={$amministratore['id_amministratore']}" ?>">

    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Username</label></td>
            <td><input type="text" name="username" id="username" value="<?php echo htmlspecialchars($amministratore['username']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Password</label></td>
            <td><input name="password" type="password" id="password" size="40" maxlength="45" value="" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Ripeti Password</label></td>
            <td><input name="password2" type="password" id="password2" size="40" maxlength="45" value="" /></td>
        </tr>
    </table>

    <p>
        <button type="submit" name="salva" id="salva">Salva Modifiche </button>
    </p>
    
</form>


    
<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>