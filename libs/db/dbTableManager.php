<?php

require_once realpath(dirname(__FILE__).'/dbConnector.php');

abstract class dbTableManager{
    
    protected $connector = NULL;
    
    public function __construct() {
        $this->connector = dbConnector::getInstance();
    }
    
}


?>
