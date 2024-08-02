<?php

require_once realpath( dirname(__FILE__).'/dbTableManager.php' );


class Ordini extends dbTableManager{
    
    function aggiungi_ordine($ordine){
        foreach ($ordine as $key => $value) {
            $ordine[$key] = addslashes($ordine[$key]);
            $ordine[$key] = (empty($ordine[$key]) && ($ordine[$key]!==0) && ($ordine[$key]!=='0') ) ? 'NULL' : "'{$ordine[$key]}'";
        }
        $sql = "INSERT INTO `ordini`(`id_ordine`, `id_prodotto`, `nome_prodotto`, `costo_prodotto`, `costo_spedizione`, 
                                     `biglietto`, `data_spedizione`, `id_utente`, `nome`, `cognome`, `telefono`, `email`, 
                                     `nome_sped`, `cognome_sped`, `telefono_sped`, `state_sped`, `country_sped`, `city_sped`, 
                                     `cap_sped`, `address_sped`, `order_details`, `invoice_details`, `agency_name`, 
                                     `agency_address`, `agency_code`, `sliceofday`) 
                            VALUES (NULL, {$ordine['id_prodotto']}, {$ordine['nome_prodotto']}, {$ordine['costo_prodotto']}, 
                                   {$ordine['costo_spedizione']}, {$ordine['biglietto']}, {$ordine['data_spedizione']}, 
                                   {$ordine['id_utente']}, {$ordine['nome']}, {$ordine['cognome']}, {$ordine['telefono']}, 
                                   {$ordine['email']}, {$ordine['nome_sped']}, {$ordine['cognome_sped']}, {$ordine['telefono_sped']}, 
                                   {$ordine['state_sped']}, {$ordine['country_sped']}, {$ordine['city_sped']}, {$ordine['cap_sped']}, 
                                   {$ordine['address_sped']}, {$ordine['order_details']}, {$ordine['invoice_details']}, 
                                   {$ordine['agency_name']}, {$ordine['agency_address']}, {$ordine['agency_code']}, {$ordine['sliceofday']} )";
        return $this->connector->insert($sql);
    }
    
    
    function get_ordine($id_ordine){
        $sql = "SELECT * FROM ordini WHERE id_ordine = $id_ordine LIMIT 1";
        return $this->connector->selectOne($sql);
    }
    
    
    function lista_ordini($params = array(), $start = 0, $limit = 0) {
        $sql = "SELECT * FROM `ordini` WHERE 1 ";

        foreach ($params as $campo => $valore) {
            $campo = addslashes($campo);
            $valore = addslashes($valore);
            switch ($campo) {
                case 'testo':
                    if(!empty($valore)){
                        //$sql .= " AND ordini.id_ordine='{$valore}' ";
                        $array_txt = explode(" ", $valore);
                        foreach ($array_txt as $key =>$value) {
                            $array_txt[$key] = " ( (nome LIKE '%{$array_txt[$key]}%') OR
                                                   (cognome LIKE '%{$array_txt[$key]}%') OR
                                                   (email LIKE '%{$array_txt[$key]}%') OR 
                                                   (nome_sped LIKE '%{$array_txt[$key]}%') OR
                                                   (cognome_sped LIKE '%{$array_txt[$key]}%') OR
                                                   (address_sped LIKE '%{$array_txt[$key]}%') OR
                                                   (agency_name LIKE '%{$array_txt[$key]}%') OR
                                                   (agency_code LIKE '%{$array_txt[$key]}%')
                                                 ) ";
                        }
                        $sql .= " AND ( " . implode(" AND ", $array_txt) . " ) ";
                    }
                    break;
                case 'data_inizio':
                    if(!empty($valore)){
                        $sql .= " AND `data_spedizione`>='{$valore}' ";
                    }
                    break;
                case 'data_fine';
                    if(!empty($valore)){
                        $sql .= " AND `data_spedizione`<='{$valore}' ";
                    }
                    break;
                case 'stato_ordine':
                    if(!empty($valore)){
                        $sql .= " AND `stato_ordine`='{$valore}' ";
                    }
                    break;
                default:
                    $sql .= " AND $campo = '$valore' ";
                    break;
            }
        }
        
        $sql .= ' ORDER BY id_ordine DESC ';
        
        if( isset($start) && !empty($limit)){
            $sql .= " LIMIT $start, $limit ";
        }
        
        return $this->connector->selectAll($sql);
    }
    
    
    function modifica_ordine($ordine){
        foreach ($ordine as $key => $value) {
            $ordine[$key] = addslashes($ordine[$key]);
            $ordine[$key] = (empty($ordine[$key]) && ($ordine[$key] !== 0) && ($ordine[$key] !== '0') ) ? 'NULL' : "'{$ordine[$key]}'";
        }
        $sql = "UPDATE `ordini` SET `id_prodotto`= {$ordine['id_prodotto']}, 
                                    `nome_prodotto`= {$ordine['nome_prodotto']}, 
                                    `costo_prodotto`= {$ordine['costo_prodotto']}, 
                                    `costo_spedizione`= {$ordine['costo_spedizione']}, 
                                    `biglietto`= {$ordine['biglietto']}, 
                                    `data_spedizione`= {$ordine['data_spedizione']}, 
                                    `id_utente`= {$ordine['id_utente']}, 
                                    `nome`= {$ordine['nome']}, 
                                    `cognome`= {$ordine['cognome']}, 
                                    `telefono`= {$ordine['telefono']}, 
                                    `email`= {$ordine['email']}, 
                                    `nome_sped`= {$ordine['nome_sped']}, 
                                    `cognome_sped`= {$ordine['cognome_sped']}, 
                                    `telefono_sped`= {$ordine['telefono_sped']}, 
                                    `state_sped`= {$ordine['state_sped']}, 
                                    `country_sped`= {$ordine['country_sped']}, 
                                    `city_sped`= {$ordine['city_sped']}, 
                                    `cap_sped`= {$ordine['cap_sped']}, 
                                    `address_sped`= {$ordine['address_sped']}, 
                                    `order_details`= {$ordine['order_details']}, 
                                    `invoice_details`= {$ordine['invoice_details']}, 
                                    `agency_name`= {$ordine['agency_name']}, 
                                    `agency_address`= {$ordine['agency_address']}, 
                                    `agency_code`= {$ordine['agency_code']}, 
                                    `stato_ordine`= {$ordine['stato_ordine']}, 
                                    `sliceofday`= {$ordine['sliceofday']} 
                                WHERE `id_ordine`= {$ordine['id_ordine']}";
        return $this->connector->update_delete_query($sql);
    }
    
    
    function elimina_ordine( $id_ordine ){
        $sql = "DELETE FROM ordini WHERE id_ordine = $id_ordine LIMIT 1";
        return $this->connector->update_delete_query($sql);
    }
    
    
}


?>
