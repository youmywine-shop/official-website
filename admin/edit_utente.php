<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Utenti | Modifica';
$template['content'] = '';


require_once '../libs/helper/mail_validator.php';
require_once '../libs/db/Utenti.php';
$Utenti = new Utenti();


$id_utente = !empty($_GET['id']) ? $_GET['id'] : '';
$utente = $Utenti->get_utente($id_utente);
if(!$utente){
    header('Location: error.php?code=19');
    exit();
}

$salvataggio_completato=FALSE;
$error = array();

if(array_key_exists('salva_dettagli', $_POST)){
    if( empty($_POST['nome']) ){ $error[] = 'nome'; }else{ $utente['nome']=$_POST['nome']; }
    if( empty($_POST['cognome']) ){ $error[] = 'cognome'; }else{ $utente['cognome']=$_POST['cognome']; }
    if( array_key_exists('telefono', $_POST) ){ $utente['telefono']=$_POST['telefono']; }
    if( empty($_POST['email']) || !valid_email($_POST['email']) ){ $error[] = 'email'; }else{ $utente['email']=$_POST['email']; }
    
    if( empty($_POST['state']) ){ $error[] = 'state'; }else{ $utente['state']=$_POST['state']; }
    if( empty($_POST['country']) ){ $error[] = 'country'; }else{ $utente['country']=$_POST['country']; }
    if( empty($_POST['city']) ){ $error[] = 'city'; }else{ $utente['city']=$_POST['city']; }
    if( empty($_POST['address']) ){ $error[] = 'address'; }else{ $utente['address']=$_POST['address']; }
    
    if( !count($error) ){
        if( $Utenti->modifica_utente($utente) ){
            $salvataggio_completato = TRUE;
        }else{
            header('Location: error.php?code=20');
            exit();
        }
    }
}


if(array_key_exists('save_invoice', $_POST)){
    if( !empty($_POST['agency_name']) || !empty($_POST['agency_address']) || !empty($_POST['agency_code']) ){
        if( empty($_POST['agency_name']) ){ $error[] = 'agency_name'; }else{ $utente['agency_name']=$_POST['agency_name']; }
        if( empty($_POST['agency_address']) ){ $error[] = 'agency_address'; }else{ $utente['agency_address']=$_POST['agency_address']; }
        if( empty($_POST['agency_code']) ){ $error[] = 'agency_code'; }else{ $utente['agency_code']=$_POST['agency_code']; }
    }else{
        $utente['agency_name'] = '';
        $utente['agency_address'] = '';
        $utente['agency_code'] = '';
    }
    
    if( !count($error) ){
        if( $Utenti->modifica_utente($utente) ){
            $salvataggio_completato = TRUE;
        }else{
            header('Location: error.php?code=20');
            exit();
        }
    }
    
}


if(array_key_exists('save_password', $_POST)){
    $new_password = NULL;
    if( empty($_POST['password']) || empty($_POST['password2']) || strcmp($_POST['password'], $_POST['password2']) ){ $error[] = 'password'; $error[] = 'password2'; }else{ $new_password=$_POST['password']; }
    if(!count($error)){
        if($Utenti->modifica_pwd_utente($utente, $new_password)){
            $salvataggio_completato = TRUE;
        }else{
            header('Location: error.php');
            exit();
        }
    }
}


?>


<!--<h1>Modifica Utente</h1>-->

<?php
    include_once '../libs/helper/view_errors.php'; show_errors($error, TRUE);
    
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
?>

<a style="position:relative; top:-10px; left:1000px;" href="gestione_utenti.php">&laquo; BACK &raquo;</a>    
    
<form id="frm_edit_utente" action="<?= "{$_SERVER['PHP_SELF']}?id={$utente['id_utente']}" ?>" method="post" >
    
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nome *</label></td>
            <td><input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($utente['nome']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Cognome *</label></td>
            <td><input type="text" name="cognome" id="cognome" value="<?php echo htmlspecialchars($utente['cognome']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Telefono</label></td>
            <td><input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($utente['telefono']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Email *</label></td>
            <td><input type="text" name="email" id="email" value="<?php echo htmlspecialchars($utente['email']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">State *</label></td>
            <td><input type="text" name="state" id="state" value="<?php echo htmlspecialchars($utente['state']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Country *</label></td>
            <td><input type="text" name="country" id="country" value="<?php echo htmlspecialchars($utente['country']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">City *</label></td>
            <td><input type="text" name="city" id="city" value="<?php echo htmlspecialchars($utente['city']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Address *</label></td>
            <td><input type="text" name="address" id="address" value="<?php echo htmlspecialchars($utente['address']); ?>" /></td>
        </tr>
        
    </table>
    
    <p>
        <button type="submit" name="salva_dettagli" id="salva_dettagli">Salva Modifiche</button>
    </p>
</form>


<hr/>


<form id="frm_user_invoice" action="<?= "{$_SERVER['PHP_SELF']}?id={$utente['id_utente']}" ?>" method="post" >
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Agency</label></td>
            <td><input type="text" name="agency_name" id="agency_name" value="<?php echo htmlspecialchars($utente['agency_name']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Address</label></td>
            <td><input type="text" name="agency_address" id="agency_address" value="<?php echo htmlspecialchars($utente['agency_address']); ?>" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Code</label></td>
            <td><input type="text" name="agency_code" id="agency_code" value="<?php echo htmlspecialchars($utente['agency_code']); ?>" /></td>
        </tr>
    </table>
    
    <p>
        <button type="submit" name="save_invoice" id="save_invoice">Salva Modifiche</button>
    </p>
</form>


<hr/>


<form id="password_change" action="<?= "{$_SERVER['PHP_SELF']}?id={$utente['id_utente']}" ?>" method="post" >
    <table class="table-input" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><label class="inputlabel">Nuova password</label></td>
            <td><input name="password" id="password" type="password" value="" /></td>
        </tr>
        <tr>
            <td><label class="inputlabel">Reinserisci password</label></td>
            <td><input name="password2" id="password2" type="password" value="" /></td>
        </tr>
        
    </table>
    <p>
        <button type="submit" name="save_password" id="save_password">Salva Modifiche</button>
    </p>
</form>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>