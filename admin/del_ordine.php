<?php

include_once 'verifica_login.php';

require_once '../libs/db/Ordini.php';
$Ordini = new Ordini();

if( empty ($_GET['id']) ){
    header('Location: error.php?code=1');
    exit();
}


if ( $Ordini->get_ordine($_GET['id']) && $Ordini->elimina_ordine($_GET['id'])  ){
        header('Location: gestione_ordini.php');
        exit();
}else{
    header('Location: error.php?code=24');
    exit();
}

?>
