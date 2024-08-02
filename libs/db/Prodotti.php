<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );


class Prodotti extends dbTableManager{
    
    
    function aggiungi_prodotto($prodotto){
        foreach ($prodotto as $key => $value) {
            $prodotto[$key] = addslashes($prodotto[$key]);
            $prodotto[$key] = (empty($prodotto[$key]) && ($prodotto[$key]!==0) && ($prodotto[$key]!=='0') ) ? 'NULL' : "'{$prodotto[$key]}'";
        }
        
        $sql = "INSERT INTO `prodotti` (`id_prodotto`, `nome`, `descrizione`, `prezzo`, `id_categoria`, `id_location`)
                                      VALUES (NULL, {$prodotto['nome']}, {$prodotto['descrizione']}, {$prodotto['prezzo']}, {$prodotto['id_categoria']}, {$prodotto['id_location']} );";
        return $this->connector->insert($sql);
    }
    
    
    function get_prodotto($id_prodotto){
        $sql = "SELECT * FROM prodotti WHERE id_prodotto = $id_prodotto LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function lista_prodotti( $params=array() ){
        $sql = "SELECT * FROM `prodotti` WHERE 1 ";
        
        foreach ($params as $campo => $valore) {
            $campo = addslashes($campo);
            $valore = addslashes($valore);
            switch ($campo) {
                default:
                    $sql .= " AND $campo = '$valore' ";
                    break;
            }
        }
        
        return $this->connector->selectAll($sql);
    }
    
    
    function modifica_prodotto($prodotto){
        foreach ($prodotto as $key => $value) {
            $prodotto[$key] = addslashes($prodotto[$key]);
            $prodotto[$key] = (empty($prodotto[$key]) && ($prodotto[$key]!==0) && ($prodotto[$key]!=='0') ) ? 'NULL' : "'{$prodotto[$key]}'";
        }
        $sql = "UPDATE `prodotti` SET `nome` = {$prodotto['nome']},
                                      `descrizione`= {$prodotto['descrizione']}, 
                                      `prezzo`= {$prodotto['prezzo']}, 
                                      `id_categoria`= {$prodotto['id_categoria']}, 
                                      `id_location`= {$prodotto['id_location']}
                                WHERE `id_prodotto` = {$prodotto['id_prodotto']} LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function elimina_prodotto( $id_prodotto ){
        $sql = "DELETE FROM prodotti WHERE id_prodotto = $id_prodotto LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }
    
    
}


?>