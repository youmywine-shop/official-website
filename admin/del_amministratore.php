<?php

include_once 'verifica_login.php';

require_once '../libs/db/Amministratori.php';
$Amministratori = new Amministratori();

if( empty ($_GET['id']) ){
    header('Location: error.php?code=1');
    exit();
}


$Amministratori->lista_amministratori();
$dbConnection = dbConnector::getInstance();
if( $dbConnection->affected_rows == 1 ){
    header('Location: error.php?code=5');
    exit();
}


if ( $Amministratori->get_amministratore($_GET['id']) && $Amministratori->elimina_amministratore($_GET['id'])  ){
        header('Location: gestione_amministratori.php');
        exit();
}else{
    header('Location: error.php?code=5');
    exit();
}

?>
