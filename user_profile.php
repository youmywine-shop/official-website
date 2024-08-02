<?php

$template = array();
$template['page'] = 'user-profile.tpl.php';


require_once realpath(dirname(__FILE__).'/libs/verifica_login.php');


require_once realpath('libs/helper/view_errors.php');
require_once realpath('./libs/helper/mail_validator.php');
require_once realpath('./libs/db/Utenti.php');
$Utenti = new Utenti();


$error = array();
$salvataggio_completato = FALSE;

if(array_key_exists('save_details', $_POST)){
    
    if( empty($_POST['nome']) ){ $error[] = 'nome'; }else{ $utente['nome']=$_POST['nome']; }
    if( empty($_POST['cognome']) ){ $error[] = 'cognome'; }else{ $utente['cognome']=$_POST['cognome']; }
    if( array_key_exists('telefono', $_POST) ){ $utente['telefono']=$_POST['telefono']; }
    if( empty($_POST['email']) || !valid_email( strtolower($_POST['email'])) ){ $error_reg[] = 'email'; }else{ $nuovo_utente['email']= strtolower($_POST['email']); }
    
    if( empty($_POST['state']) ){ $error[] = 'state'; }else{ $utente['state']=$_POST['state']; }
    if( empty($_POST['country']) ){ $error[] = 'country'; }else{ $utente['country']=$_POST['country']; }
    if( empty($_POST['city']) ){ $error[] = 'city'; }else{ $utente['city']=$_POST['city']; }
    if( empty($_POST['address']) ){ $error[] = 'address'; }else{ $utente['address']=$_POST['address']; }
    
    if( !count($error) ){
        if( $Utenti->modifica_utente($utente) ){
            $salvataggio_completato = TRUE;
        }else{
            header('Location: error.php');
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
            header('Location: error.php');
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



include './template/frontend/user.tpl.php';
?>