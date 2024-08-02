<?php


class dbConnector{
    
//    private $user = 'qzcwvzdo_ymw';
//    private $pass = '[[ymwdatabase]]';
//    private $db_name = 'qzcwvzdo_ymw';
//    private $host = 'mysql.netsons.com';

    private $user = 'ymw';
    private $pass = 'password';
    private $db_name = 'ymw';
    private $host = 'localhost';
     
//    private $user = 'youmywine';
//    private $pass = 'youmywine';
//    private $db_name = 'youmywine';
//    private $host = 'localhost';
    
    private $connection = NULL;
    
    private static $singleton = null; 
    
    public static function getInstance(){
        if (dbConnector::$singleton == null){
            dbConnector::$singleton = new dbConnector();
        }
        return dbConnector::$singleton;
    }
    
    
    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
    } 
    
    function __destruct() { 
        $this->connection->close();
    }
    
    function __get($name) {
        switch ($name){
            case 'affected_rows':
                return $this->connection->affected_rows;
                break;
            default : throw Exception;
        }
    }
    
    
    //Generic functions 
    public function selectAll($sql){
        $toReturn=array();
        if( ($risultato = $this->connection->query($sql)) && ($this->connection->affected_rows>0) ){
            while ( $riga = mysqli_fetch_assoc($risultato) ){
                $toReturn[]=$riga;
            }
        }
        return $toReturn;
    }
    
    public function selectOne($sql){
        $toReturn = FALSE;
        if( ($result = $this->connection->query($sql)) && ( $this->connection->affected_rows>0 ) ){
            $riga = mysqli_fetch_array($result);
            $toReturn=$riga;
        }
        return $toReturn;
    }
    
    public function insert($sql){
        if( $this->connection->query($sql) === TRUE ){
            return $this->connection->insert_id;
        }
        return FALSE;
    }
    
    public function update_delete_query($sql){
        if( $this->connection->query($sql) === TRUE ){
            return TRUE;
        }
        return FALSE;
    }
    
    public function query($sql){
        return $this->connection->query($sql);
    }
    
}

?>
