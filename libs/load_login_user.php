<?php

/*
 * CARICA L'UTENTE LOGGATO SE IN SESSIONE SONO SETTATE LE VARIABILI
 */

require_once realpath(dirname(__FILE__).'/db/Utenti.php');

//require_once('./db/Utenti.php');

$Utenti = new Utenti();

if( !isset ($_SESSION) ){
    session_start();
}


$utente = array();
if( !empty($_SESSION['id_utente']) ){
    $utente = $Utenti->get_utente($_SESSION['id_utente']);
}

?>
