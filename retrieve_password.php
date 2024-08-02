<?php

$template = array();
$template['page'] = 'retrieve_password.tpl.php';

require_once realpath('libs/helper/view_errors.php');
require_once './libs/db/Utenti.php';
$Utenti = new Utenti();


$error= array();


$email = !empty($_GET['m']) ? $_GET['m'] : '';
$token_ricevuto = !empty($_GET['tk']) ? $_GET['tk'] : '';


$utente = $Utenti->get_utente_by_mail($email);
if( !$utente || empty($token_ricevuto) ){
    header('Location: index.php');
    exit();
}

$server_key='ner83jmef834jfd8oo3nre8rn383nf83bnf8';
$tk = md5("{$server_key}{$utente['email']}{$utente['password']}{$server_key}");
if(strcmp($token_ricevuto, $tk)){
    header('Location: index.php');
    exit();
}


if(array_key_exists('save_password', $_POST)){
    $new_password = NULL;
    if( empty($_POST['password']) || empty($_POST['password2']) || strcmp($_POST['password'], $_POST['password2']) ){ $error[] = 'password'; $error[] = 'password2'; }else{ $new_password=$_POST['password']; }
    if(!count($error)){
        if($Utenti->modifica_pwd_utente($utente, $new_password)){
            header('Location: user_login.php');
            exit();
        }else{
            header('Location: error.php');
            exit();
        }
    }
}



include './template/frontend/user.tpl.php';
?>
