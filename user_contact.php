<?php

$template = array();
$template['page'] = 'user-contact.tpl.php';

require_once './libs/mail/mail.php';
require_once realpath('libs/helper/view_errors.php');


$mail = array();
$mail['nome'] = '';
$mail['email'] = '';
$mail['testo'] = '';



$mail_inviata = FALSE;
$error = array();

if(array_key_exists('send', $_POST) ){
    if(empty($_POST['nome']) ){ $error[] = 'nome'; }else{ $mail['nome'] = $_POST['nome']; }
    if(empty($_POST['email']) ){ $error[] = 'email'; }else{ $mail['email'] = $_POST['email']; }
    if(empty($_POST['testo']) ){ $error[] = 'testo'; }else{ $mail['testo'] = $_POST['testo']; }
    
    if(!count($error)){
        
        $testo = "<p>You have been contacted by <strong>{$mail['nome']}</strong><br/>" .
                 "Date & Time : " . date('d-m-Y H:i') . "<br/>" .
                 "Email : <strong>{$mail['email']}</strong> <br/>" .
                 "<p>Message:<br/>" .
                 str_replace("\n", '<br/>', $mail['testo']) .
                 "</p>";

        invia_mail($testo, 'YouMyWine - Contact by form', '', "info@youmywine.com");
        $mail_inviata = TRUE;
    }
    
}




include './template/frontend/user.tpl.php';
?>