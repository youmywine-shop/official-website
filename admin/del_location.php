<?php

require_once '../libs/db/dbTransaction.php';
require_once '../libs/db/Locations.php';
$Locations = new Locations();


if( empty($_GET['id']) ){
    header('Location: gestione_locations.php');
    exit();
}

dbTransactions::start_transaction();

if ( $Locations->get_location($_GET['id']) && 
     $Locations->elimina_location($_GET['id'])  && 
    (!file_exists("../images/img_locations/{$_GET['id']}.png") || unlink("../images/img_locations/{$_GET['id']}.png") ) ){
        
        dbTransactions::transaction_commit();
        header('Location: gestione_locations.php');
        exit();
}else{
    dbTransactions::transaction_rollback();
    header('Location: error.php?code=13');
    exit();
}

?>
