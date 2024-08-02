<?php

$template = array();
$template['page'] = 'user-login.tpl.php';


$referer = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
if( !empty($referer) ){
    $referer_details = parse_url($referer);
    if( ($referer_details['host']==$_SERVER['HTTP_HOST']) && strpos($referer_details['path'], 'cart') ){
//        if(!isset($_SESSION)){ session_start(); }
        setcookie('pagina_provenienza', "{$referer_details['path']}?{$referer_details['query']}");
    }  elseif ( ($referer_details['host']==$_SERVER['HTTP_HOST']) && !strpos($referer_details['path'], 'user_login') ) {
        setcookie('pagina_provenienza', '', time()-3600);
    }
}


require_once realpath('libs/helper/view_errors.php');
require_once realpath('./libs/helper/mail_validator.php');
require_once realpath('./libs/db/Utenti.php');
$Utenti = new Utenti();

if(!isset ($_SESSION)){
    session_start();
}

if( !empty($_SESSION['id_utente']) && !empty($_SESSION['denominazione']) ){
    if ( $Utenti->get_utente($_SESSION['id_utente']) ){
        header('Location: index.php');
        exit();
    }
}

$error=0;

if(!empty($_POST['login_email']) && !empty($_POST['login_password'])){
    
    if( $utente = $Utenti->verifica_utente( $_POST['login_email'], $_POST['login_password']) ){ 
        //elimina solo le variabili login utente e login admin
        if( isset ($_SESSION['id_utente']) ) unset ($_SESSION['id_utente']);
        if( isset ($_SESSION['denominazione']) ) unset ($_SESSION['denominazione']);
        if( isset ($_SESSION['adm_mode']) ) unset ($_SESSION['adm_mode']);
        
        /***** LOGIN *****/
        $_SESSION['id_utente'] = $utente['id_utente'];
        $_SESSION['denominazione'] = "{$utente['cognome']} {$utente['nome']}";
        /*****************/
        
        if(!empty($_COOKIE['pagina_provenienza'])){
            header('Location: '.$_COOKIE['pagina_provenienza']);
            setcookie('pagina_provenienza', '', time()-3600);
        }else{
            //header('Location: index.php');
            header('Location: user_profile.php');
        }
        exit();
    }else{
        $error=1;
    }
}



/* REGISTRAZIONE */
$nuovo_utente = array();
$nuovo_utente['nome']='';
$nuovo_utente['cognome']='';
$nuovo_utente['telefono']='';
$nuovo_utente['email']='';
$nuovo_utente['password']='';
$nuovo_utente['state'] = '';
$nuovo_utente['country'] = '';
$nuovo_utente['city'] = '';
$nuovo_utente['address'] = '';
$nuovo_utente['whatwine'] = '';
$nuovo_utente['agency_name'] = '';
$nuovo_utente['agency_address'] = '';
$nuovo_utente['agency_code'] = '';


$error_reg = array();
if(array_key_exists('registra', $_POST)){
    
    if( empty($_POST['nome']) ){ $error_reg[] = 'nome'; }else{ $nuovo_utente['nome']=$_POST['nome']; }
    if( empty($_POST['cognome']) ){ $error_reg[] = 'cognome'; }else{ $nuovo_utente['cognome']=$_POST['cognome']; }
    if( array_key_exists('telefono', $_POST) ){ $nuovo_utente['telefono']=$_POST['telefono']; }
    if( empty($_POST['email']) || !valid_email( strtolower($_POST['email'])) ){ $error_reg[] = 'email'; }else{ $nuovo_utente['email']= strtolower($_POST['email']); }
    if( empty($_POST['password']) || empty($_POST['password2']) || strcmp($_POST['password'], $_POST['password2']) ){ $error_reg[] = 'password'; }else{ $nuovo_utente['password']=$_POST['password']; }
    
    if( empty($_POST['state']) ){ $error_reg[] = 'state'; }else{ $nuovo_utente['state']=$_POST['state']; }
    if( empty($_POST['country']) ){ $error_reg[] = 'country'; }else{ $nuovo_utente['country']=$_POST['country']; }
    if( empty($_POST['city']) ){ $error_reg[] = 'city'; }else{ $nuovo_utente['city']=$_POST['city']; }
    if( empty($_POST['address']) ){ $error_reg[] = 'address'; }else{ $nuovo_utente['address']=$_POST['address']; }
    if( empty($_POST['whatwine']) ){ $error_reg[] = 'whatwine'; }else{ $nuovo_utente['whatwine']=$_POST['whatwine']; }
    
    if( !empty($_POST['agency_name']) || !empty($_POST['agency_address']) || !empty($_POST['agency_code']) ){
        if( empty($_POST['agency_name']) ){ $error_reg[] = 'agency_name'; }else{ $nuovo_utente['agency_name']=$_POST['agency_name']; }
        if( empty($_POST['agency_address']) ){ $error_reg[] = 'agency_address'; }else{ $nuovo_utente['agency_address']=$_POST['agency_address']; }
        if( empty($_POST['agency_code']) ){ $error_reg[] = 'agency_code'; }else{ $nuovo_utente['agency_code']=$_POST['agency_code']; }
    }
    
    
    if( !count($error_reg) ){
        
        if( $id_utente = $Utenti->aggiungi_utente($nuovo_utente) ){
            /***** LOGIN *****/
            $_SESSION['id_utente'] = $id_utente;
            $_SESSION['denominazione'] = "{$nuovo_utente['cognome']} {$nuovo_utente['nome']}";
            /*****************/

            if(!empty($_COOKIE['pagina_provenienza'])){
                header('Location: '.$_COOKIE['pagina_provenienza']);
                setcookie('pagina_provenienza', '', time()-3600);
            }else{
                header('Location: user_profile.php');
            }
            exit();
            
        }else{
            header('Location: error.php');
            exit();
        }
        
    }
    
}


include './template/frontend/user.tpl.php';
?>