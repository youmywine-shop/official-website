<?php

$template = array();
$template['page'] = 'lost_password.tpl.php';

require_once realpath('libs/helper/view_errors.php');
require_once './libs/db/Utenti.php';
$Utenti = new Utenti();

$mail_inviata = FALSE;
$error= array();

if(array_key_exists('retrieve', $_POST) ){
    
    $email = '';
    
    if(empty($_POST['email'])){ $error[] = 'email'; }else{ $email = $_POST['email'];}
    
    if(!count($error)){
        $utente = $Utenti->get_utente_by_mail($email);
            
        if(!empty($utente)){

            
            $server_key='ner83jmef834jfd8oo3nre8rn383nf83bnf8';
            $tk = md5("{$server_key}{$utente['email']}{$utente['password']}{$server_key}");
            
            $path_array = explode('/', $_SERVER['PHP_SELF']);
            $path = (count($path_array)>1) ? implode('/', array_slice($path_array, 0, count($path_array)-1) ) : '';
//            echo "http://{$_SERVER['HTTP_HOST']}{$path}/retrieve_password.php?m=".$email.'&tk='.$tk;
            $link = "http://{$_SERVER['HTTP_HOST']}{$path}/retrieve_password.php?m=".$email.'&tk='.$tk;
            // SEND LINK VIA MAIL
            
            require_once './libs/mail/mail.php';
            $mail_txt = '<p>To retrieve your password follow this link.<br/>'.
                        "<a href=\"$link\">CHANGE PASSWORD</a></p>";
            invia_mail($mail_txt, 'YouMyWine - Change Password', 'noreply@youmywine.com', $email);
            
            $mail_inviata = TRUE;
        }else{
            $error[] = 'email';
        }
    }
    
}

include './template/frontend/user.tpl.php';
?>