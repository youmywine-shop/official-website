<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );


class Utenti extends dbTableManager{
    
    function aggiungi_utente($utente){
        $utente['password'] = md5($utente['password']);
        foreach ($utente as $key => $value) {
            $utente[$key] = addslashes($utente[$key]);
            $utente[$key] = (empty($utente[$key]) && ($utente[$key]!==0) && ($utente[$key]!=='0') ) ? 'NULL' : "'{$utente[$key]}'";
        }
        $sql = "INSERT INTO `utenti`(`id_utente`, `nome`, `cognome`, `telefono`, `email`, `password`, `state`, 
                                    `country`, `city`, `address`, `whatwine`, `agency_name`, `agency_address`, `agency_code`) 
                            VALUES (NULL, {$utente['nome']}, {$utente['cognome']}, {$utente['telefono']},
                                   {$utente['email']}, {$utente['password']}, {$utente['state']}, {$utente['country']},
                                   {$utente['city']}, {$utente['address']}, {$utente['whatwine']}, {$utente['agency_name']}, 
                                   {$utente['agency_address']}, {$utente['agency_code']})";
        return $this->connector->insert($sql);
    }
    
    
    function get_utente($id_utente){
        $sql = "SELECT * FROM utenti WHERE id_utente = $id_utente LIMIT 1";
        return $this->connector->selectOne($sql);
    }

    
    function get_utente_by_mail($email){
        $email = addslashes($email);
        $email = (empty($email) && ($email!==0) && ($email!=='0') ) ? 'NULL' : "'{$email}'";
        $sql = "SELECT * FROM utenti WHERE email = {$email} LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function verifica_utente($email, $password){
        $email = !empty($email) ? addslashes($email) : '';
        $password = !empty($password) ? md5($password) : '';
        $sql = "SELECT * FROM utenti WHERE email = '$email' AND password = '$password' LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function modifica_utente($utente){
        foreach ($utente as $key => $value) {
            $utente[$key] = addslashes($utente[$key]);
            switch ((string) $key) {
//                    case 'password' : 
//                        $utente['password'] = !empty($utente['password']) ? "'".md5($utente['password'])."'" : 'utenti.password';
//                        break;
                default :
                    $utente[$key] = (empty($utente[$key]) && ($utente[$key] !== 0) && ($utente[$key] !== '0') ) ? 'NULL' : "'{$utente[$key]}'";
                    break;
            }
        }
        $sql = "UPDATE `utenti` SET `nome` = {$utente['nome']}, 
                                        `cognome` = {$utente['cognome']}, 
                                        `telefono` = {$utente['telefono']}, 
                                        `email` = {$utente['email']}, 
                                        `state` = {$utente['state']}, 
                                        `country` = {$utente['country']}, 
                                        `city` = {$utente['city']}, 
                                        `address` = {$utente['address']}, 
                                        `whatwine` = {$utente['whatwine']},
                                        `agency_name`= {$utente['agency_name']}, 
                                        `agency_address`= {$utente['agency_address']},
                                        `agency_code`= {$utente['agency_code']} 
                            WHERE `id_utente` = {$utente['id_utente']};";
        return $this->connector->update_delete_query($sql);
    }
        
    
    function modifica_pwd_utente($utente, $password){
        if(empty($password)){
            return FALSE;
        }
        $utente['password'] = md5($password);
        $sql = "UPDATE `utenti` SET `password` = '{$utente['password']}' "
                   ." WHERE `id_utente` = {$utente['id_utente']} LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function lista_utenti($params = array(), $start = 0, $limit = 0) {
        $sql = "SELECT * FROM `utenti` WHERE 1 ";

        foreach ($params as $campo => $valore) {
            $campo = addslashes($campo);
            $valore = addslashes($valore);
            switch ($campo) {
                case 'testo':
                    if(!empty($valore)){
                        $array_txt = explode(" ", $valore);
                        foreach ($array_txt as $key =>$value) {
                            $array_txt[$key] = " ( (nome LIKE '%{$array_txt[$key]}%') OR
                                                   (cognome LIKE '%{$array_txt[$key]}%') OR
                                                   (email LIKE '%{$array_txt[$key]}%') OR 
                                                   (agency_name LIKE '%{$array_txt[$key]}%') OR
                                                   (agency_code LIKE '%{$array_txt[$key]}%')
                                                 ) ";
                        }
                        $sql .= " AND ( " . implode(" AND ", $array_txt) . " ) ";
                    }
                    break;
                default:
                    $sql .= " AND $campo = '$valore' ";
                    break;
            }
        }
        
        if( isset($start) && !empty($limit)){
            $sql .= " LIMIT $start, $limit ";
        }
        return $this->connector->selectAll($sql);
    }
    
    function elimina_utente( $id_utente ){
        $sql = "DELETE FROM utenti WHERE id_utente = $id_utente LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }

}

?>
