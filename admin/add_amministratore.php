<?php


require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Amministratori | Aggiungi';
$template['content'] = '';

require_once '../libs/db/Amministratori.php';
$Amministratori = new Amministratori();


$amministratore = array();
$amministratore['username']='';
$amministratore['password']='';

$error = array();

if(array_key_exists('aggiungi', $_POST)){
    if( empty($_POST['username']) ){ $error[]='username'; }else{ $amministratore['username'] = $_POST['username']; }
    if( empty($_POST['password']) || empty($_POST['password2']) || strcmp($_POST['password'], $_POST['password2']) ){ $error[] = 'password'; }else{ $amministratore['password']=$_POST['password']; }
            
    if( !count($error) ){
        if( $Amministratori->aggiungi_amministratore($amministratore) ){
            header('Location: gestione_amministratori.php');
            exit();
        }else{
            header('Location: error.php?code=2');
            exit();
        }
    }
}

?>

<!--<h1>Nuovo Amministratore</h1>-->

<?php
require '../libs/helper/view_errors.php';
show_errors($error, TRUE);
?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_amministratori.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_add_amministratore" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">

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
        <button type="submit" name="aggiungi" id="aggiungi">Aggiungi Amministratore</button>
    </p>
  
</form>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';

?>