<?php

require_once realpath(dirname(__FILE__).'/dbConnector.php');
//require_once './dbConnector.php';

class dbTransactions{
    
    private static function query($query){
        $connector = dbConnector::getInstance();
        $connector->query($query);
    }
    
    public static function start_transaction(){
        $sql = "START TRANSACTION;";
        dbTransactions::query($sql);
    }
    
    public static function transaction_rollback(){
        $sql = "ROLLBACK;";
        dbTransactions::query($sql);
    }

    public static function transaction_commit(){
        $sql = "COMMIT;";
        dbTransactions::query($sql);
    }
    
}
?>
