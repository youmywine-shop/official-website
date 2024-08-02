<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );


class Impostazioni extends dbTableManager{
    
    function get_impostazione($chiave){
        $toReturn = false;
        if(empty($chiave)){
            return $toReturn;
        }
        $chiave = addslashes($chiave);
        $sql = "SELECT * FROM impostazioni WHERE chiave = '$chiave' LIMIT 1";
        return $this->connector->selectOne($sql);
    }

    function modifica_impostazione($impostazione){
        $impostazione['valore'] = addslashes($impostazione['valore']);
        $sql = "UPDATE `impostazioni` SET `valore` = '{$impostazione['valore']}' WHERE  `chiave` = '{$impostazione['chiave']}' LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    } 
    
}


?>
