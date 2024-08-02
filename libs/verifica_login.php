<?php

if( !isset ($_SESSION) ){
    session_start();
}

require_once realpath(dirname(__FILE__).'/db/Utenti.php');
$Utenti = new Utenti();

$utente=array();
if( empty($_SESSION['id_utente']) || !($utente=$Utenti->get_utente($_SESSION['id_utente'] )) ){
    header('Location: index.php');
    exit();
}

?>