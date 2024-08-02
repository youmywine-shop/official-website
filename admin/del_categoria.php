<?php

require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Categorie.php';
$categorie = new Categorie();

if( empty($_GET['id']) ){
    header('Location: gestione_categorie.php');
    exit();
}

dbTransactions::start_transaction();

if ( $categorie->get_categoria($_GET['id']) && 
     $categorie->elimina_categoria($_GET['id'])  && 
    (!file_exists("../images/img_categorie/{$_GET['id']}.png") || unlink("../images/img_categorie/{$_GET['id']}.png") ) ){
        
        dbTransactions::transaction_commit();
        header('Location: gestione_categorie.php');
        exit();
}else{
    dbTransactions::transaction_rollback();
    header('Location: error.php?code=9');
    exit();
}

?>
