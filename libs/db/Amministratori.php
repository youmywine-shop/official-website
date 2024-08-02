<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );

class Amministratori extends dbTableManager{
    
    function aggiungi_amministratore($amministratore){
        $amministratore['username'] = addslashes($amministratore['username']);
        $amministratore['password'] = md5($amministratore['password']);

        $sql = "INSERT INTO `amministratori` (`id_amministratore`, `username`, `password`) 
                                      VALUES (NULL, '{$amministratore['username']}', '{$amministratore['password']}' );";
        return $this->connector->insert($sql);
    }
    
    
    function get_amministratore($id_amministratore){
        $sql = "SELECT * FROM amministratori WHERE id_amministratore = $id_amministratore LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function verifica_amministratore($username, $password){
        $username = addslashes($username);
        $password = md5($password);
        $sql = "SELECT * FROM `amministratori` WHERE `username` = '{$username}' AND `password` = '{$password}' LIMIT 1 ";
        return $this->connector->selectOne($sql);
    }
    
    
    function lista_amministratori(){
        $sql = "SELECT * FROM `amministratori` WHERE 1 ";
        return $this->connector->selectAll($sql);
    }
    
    
    function modifica_amministratore($amministratore){
        $amministratore['username'] = addslashes($amministratore['username']);
        $amministratore['password'] = md5($amministratore['password']);
        $sql = "UPDATE `amministratori` SET `username` = '{$amministratore['username']}', 
                                            `password` = '{$amministratore['password']}' 
                                    WHERE `id_amministratore` = {$amministratore['id_amministratore']} LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function elimina_amministratore($id_amministratore){
        $sql = "DELETE FROM amministratori WHERE id_amministratore = $id_amministratore LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }
    
}

?>