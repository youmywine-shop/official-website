<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );

class Categorie extends dbTableManager{
    
    function aggiungi_categoria( $categoria ){
        foreach ($categoria as $key => $value) {
            $categoria[$key] = addslashes($categoria[$key]);
            $categoria[$key] = (empty($categoria[$key]) && ($categoria[$key]!==0) && ($categoria[$key]!=='0') ) ? 'NULL' : "'{$categoria[$key]}'";
        }

        $sql = "INSERT INTO `categorie` (`id_categoria`, `nome`, `descrizione`, `special`, `id_categoria_padre`) 
                                 VALUES (NULL, {$categoria['nome']}, {$categoria['descrizione']}, {$categoria['special']}, {$categoria['id_categoria_padre']});";
        return $this->connector->insert($sql);
    }
        
    function lista_categorie( $id_categoria_padre=0, $params=array() ){
        $sql = "SELECT * FROM `categorie` WHERE `id_categoria_padre` ";
        if( !$id_categoria_padre ){
           $sql.=" IS NULL ";
        }else{
            $sql.= " = $id_categoria_padre";
        }
        
        foreach ($params as $campo => $valore) {
            $campo = addslashes($campo);
            $valore = addslashes($valore);
            switch ($campo) {
                default:
                    $sql .= " AND $campo = '$valore' ";
                    break;
            }
        }
        
        $sql .= " ORDER BY indice_ordinamento ";
        return $this->connector->selectAll($sql);
    }

    function recursive_category_array($categoria_padre){
        $sql = "SELECT id_categoria FROM categorie WHERE id_categoria_padre = $categoria_padre ";
        $toReturn = array();
        if( ($risultato = $this->connector->query($sql)) && ($this->connector->affected_rows>0) ){
            while ( $riga = mysqli_fetch_assoc($risultato) ){
                $toReturn[] = $riga['id_categoria'];
                $toReturn = array_merge($toReturn , $this->recursive_category_array($riga['id_categoria']));
            }
        }
        return $toReturn;
    }

    function get_categoria( $id_categoria ){
        $sql = "SELECT * FROM categorie WHERE id_categoria= $id_categoria LIMIT 1";
        return $this->connector->selectOne($sql);
    }

    function elimina_categoria( $id_categoria ){
        $sql = "DELETE FROM categorie WHERE id_categoria = $id_categoria LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }

    function modifica_categoria( $categoria ){
        foreach ($categoria as $key => $value) {
            $categoria[$key] = addslashes($categoria[$key]);
            $categoria[$key] = (empty($categoria[$key]) && ($categoria[$key]!==0) && ($categoria[$key]!=='0') ) ? 'NULL' : "'{$categoria[$key]}'";
        }

        if( !$categoria['id_categoria_padre']) $categoria['id_categoria_padre'] = 'NULL';
        $sql = "UPDATE `categorie` SET `nome` = {$categoria['nome']}, 
                                       `descrizione` = {$categoria['descrizione']}, 
                                       `special` = {$categoria['special']}, 
                                        `id_categoria_padre` = {$categoria['id_categoria_padre']}, 
                                        `indice_ordinamento` = {$categoria['indice_ordinamento']} 
                WHERE `id_categoria` = {$categoria['id_categoria']} LIMIT 1;";
        return $this->connector->update_delete_query($sql);
    }
    
}


?>