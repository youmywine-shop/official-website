<?php

include_once 'verifica_login.php';

require_once '../libs/db/Utenti.php';
$Utenti = new Utenti();

if( empty ($_GET['id']) ){
    header('Location: error.php?code=1');
    exit();
}


if ( $Utenti->get_utente($_GET['id']) && $Utenti->elimina_utente($_GET['id'])  ){
        header('Location: gestione_utenti.php');
        exit();
}else{
    header('Location: error.php?code=21');
    exit();
}

?>
