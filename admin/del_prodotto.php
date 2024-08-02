<?php

require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Prodotti.php';
$Prodotti = new Prodotti();


if( empty($_GET['id']) ){
    header('Location: gestione_prodotti.php');
    exit();
}

dbTransactions::start_transaction();

if ( $Prodotti->get_prodotto($_GET['id']) && 
     $Prodotti->elimina_prodotto($_GET['id'])  && 
    (!file_exists("../images/img_prodotti/{$_GET['id']}.png") || unlink("../images/img_prodotti/{$_GET['id']}.png") ) ){
        
        dbTransactions::transaction_commit();
        header('Location: gestione_prodotti.php');
        exit();
}else{
    dbTransactions::transaction_rollback();
    header('Location: error.php?code=17');
    exit();
}

?>
