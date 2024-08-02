<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );


class Locations extends dbTableManager{
    
    function aggiungi_location($location){
        foreach ($location as $key => $value) {
            $location[$key] = addslashes($location[$key]);
            $location[$key] = (empty($location[$key]) && ($location[$key]!==0) && ($location[$key]!=='0') ) ? 'NULL' : "'{$location[$key]}'";
        }
        
        $sql = "INSERT INTO `locations` (`id_location`, `state`, `country`, `city`, `spedizione`, `id_location_padre`, `cap`) 
                                      VALUES (NULL, {$location['state']}, {$location['country']}, {$location['city']}, {$location['spedizione']}, {$location['id_location_padre']}, {$location['cap']} );";
        return $this->connector->insert($sql);
    }
    
    
    function get_location($id_location){
        $sql = "SELECT * FROM locations WHERE id_location = $id_location LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function lista_locations( $params=array() ){
        $sql = "SELECT *, (select count(*) from locations as L where L.`id_location_padre`=locations.id_location) AS num_sublocations FROM `locations` WHERE 1 ";
        foreach ($params as $campo => $valore) {
            $campo = addslashes($campo);
            $valore = addslashes($valore);
            switch ($campo) {
                case 'id_location_padre':
                    if(empty($valore)){
                        $sql .= " AND $campo IS NULL ";
                        break;
                    }else{
                        $sql .= " AND $campo = '$valore' ";
                        break;
                    }
                default:
                    $sql .= " AND $campo = '$valore' ";
                    break;
            }
        }
        return $this->connector->selectAll($sql);
    }
    
    
    function modifica_location($location){
        foreach ($location as $key => $value) {
            $location[$key] = addslashes($location[$key]);
            $location[$key] = (empty($location[$key]) && ($location[$key]!==0) && ($location[$key]!=='0') ) ? 'NULL' : "'{$location[$key]}'";
        }
        $sql = "UPDATE `locations` SET `state` = {$location['state']},
                                       `country` = {$location['country']},
                                       `city` = {$location['city']},
                                       `spedizione` = {$location['spedizione']}, 
                                       `id_location_padre` = {$location['id_location_padre']}, 
                                       `cap` = {$location['cap']}, 
                                       `mostrainhome` = {$location['mostrainhome']}
                                WHERE `id_location` = {$location['id_location']} LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function elimina_location( $id_location ){
        $sql = "DELETE FROM locations WHERE id_location = $id_location LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function lista_locations_by_categoria( $id_categoria , $id_location_padre=NULL){
        $sql ="SELECT DISTINCT locations.*, (select count(*) from locations as L where L.`id_location_padre`=locations.id_location) AS num_sublocations
                FROM categorie Inner Join prodotti On prodotti.id_categoria = categorie.id_categoria Inner Join
                  locations On prodotti.id_location = locations.id_location
                WHERE categorie.id_categoria = {$id_categoria} ";
        
        if(empty($id_location_padre)){
            $sql .= "AND locations.id_location_padre Is Null

                    UNION 

                    SELECT *, (select count(*) from locations as L where L.`id_location_padre`=locations.id_location) AS num_sublocations FROM locations WHERE id_location IN (
                        SELECT locations.id_location_padre 
                        FROM categorie Inner Join prodotti On prodotti.id_categoria = categorie.id_categoria Inner Join
                          locations On prodotti.id_location = locations.id_location
                        WHERE categorie.id_categoria = $id_categoria and locations.id_location_padre IS NOT NULL )";
        }else{
            $sql .= " AND locations.id_location_padre = '{$id_location_padre}' ";
        }
        return $this->connector->selectAll($sql);
    }
    
}

?>
