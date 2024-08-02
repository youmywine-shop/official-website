<?php

$template = array();
$template['page'] = 'cart.tpl.php';

require_once realpath( dirname(__FILE__).'/libs/load_login_user.php' );

require_once realpath('libs/helper/view_errors.php');

require_once realpath('./libs/helper/mail_validator.php');


require_once './libs/db/Categorie.php';
require_once './libs/db/Prodotti.php';
require_once './libs/db/Locations.php';
require_once './libs/db/Ordini.php';
require_once './libs/db/Impostazioni.php';
$Categorie = new Categorie();
$Prodotti = new Prodotti();
$Locations = new Locations();
$Ordini = new Ordini();
$Impostazioni = new Impostazioni();


/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);
/******************/


$impostazione_FORHIMHER = $Impostazioni->get_impostazione('FORHIMHER');
$impostazione_FORAMAZE = $Impostazioni->get_impostazione('FORAMAZE');
$impostazione_FOREXPERT = $Impostazioni->get_impostazione('FOREXPERT');
$impostazione_SUPERIOR = $Impostazioni->get_impostazione('SUPERIOR');
$impostazione_FORFRIENDS = $Impostazioni->get_impostazione('FORFRIENDS');
$impostazione_FORFAMILY = $Impostazioni->get_impostazione('FORFAMILY');
$impostazione_FORLOVE = $Impostazioni->get_impostazione('FORLOVE');
$impostazione_FORBUSSINESS = $Impostazioni->get_impostazione('FORBUSSINESS');





$id_prodotto = !empty($_GET['p']) ? $_GET['p'] : '';
$prodotto = $Prodotti->get_prodotto($id_prodotto);
if(!$prodotto){
    header('Location: index.php');
    exit();
}


/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);

$categoria_principale = $Categorie->get_categoria($prodotto['id_categoria']);

while($categoria_principale['id_categoria_padre']){
    $categoria_principale = $Categorie->get_categoria($categoria_principale['id_categoria_padre']);
}

foreach ($categorie_normali as $key => $categoria_n) {
    if($categoria_n['id_categoria']==$categoria_principale['id_categoria']){
        $categoria_n['active'] = TRUE;
    }else{
        $categoria_n['active'] = FALSE;
    }
    $categorie_normali[$key] = $categoria_n;
}
/******************/


$location = $Locations->get_location($prodotto['id_location']);

$img_prodotti_path = 'images/img_prodotti/';


$order = array();
$order['id_prodotto'] = $prodotto['id_prodotto'];
$order['nome_prodotto'] = $prodotto['nome'];
$order['costo_prodotto'] = $prodotto['prezzo'];
$order['costo_spedizione'] = $location['spedizione'];

$order['biglietto'] = '';
$order['data_spedizione'] = '';

$order['id_utente'] = !empty($utente) ? $utente['id_utente'] : '';
$order['nome'] = !empty($utente) ? $utente['nome'] : '';
$order['cognome'] = !empty($utente) ? $utente['cognome'] : '';
$order['telefono'] = !empty($utente) ? $utente['telefono'] : '';
$order['email'] = !empty($utente) ? $utente['email'] : '';

$order['nome_sped'] = '';
$order['cognome_sped'] = '';
$order['telefono_sped'] = '';
$order['state_sped'] = $location['state'];
$order['country_sped'] = $location['country'];
$order['city_sped'] = $location['city'];
$order['cap_sped'] = '';
$order['address_sped'] = '';

$order['order_details'] = '0';
$order['invoice_details'] = '0';

$order['agency_name'] = '';
$order['agency_address'] = '';
$order['agency_code'] = '';



$error = array();

if(array_key_exists('confirm', $_POST)){
    $order['biglietto'] = !empty($_POST['biglietto']) ? $_POST['biglietto'] : '';
    $data_spedizione = DateTime::createFromFormat('m/d/Y', $_POST['data_spedizione']);
    if(empty($_POST['data_spedizione']) || !$data_spedizione){ $error[] = 'data_spedizione'; }else{ $order['data_spedizione'] = $data_spedizione->format('Y-m-d'); }
    if(empty($_POST['sliceofday'])){ $error[] = 'sliceofday'; }else{ $order['sliceofday']=$_POST['sliceofday']; }
       
    if( empty($utente) ){
        if(empty($_POST['nome'])){ $error[] = 'nome'; }else{ $order['nome'] = $_POST['nome']; }
        if(empty($_POST['cognome'])){ $error[] = 'cognome'; }else{ $order['cognome'] = $_POST['cognome']; }
        $order['telefono'] = !empty($_POST['telefono']) ? $_POST['telefono'] : '';
        //if(empty($_POST['email'])){ $error[] = 'email'; }else{ $order['email'] = $_POST['email']; }
        if( empty($_POST['email']) || !valid_email( strtolower($_POST['email'])) ){ $error[] = 'email'; }else{ $order['email']= strtolower($_POST['email']); }
    }
    
    if(empty($_POST['nome_sped'])){ $error[] = 'nome_sped'; }else{ $order['nome_sped'] = $_POST['nome_sped']; }
    if(empty($_POST['cognome_sped'])){ $error[] = 'cognome_sped'; }else{ $order['cognome_sped'] = $_POST['cognome_sped']; }
    $order['telefono_sped'] = !empty($_POST['telefono_sped']) ? $_POST['telefono_sped'] : '';
//    if(empty($_POST['state_sped'])){ $error[] = 'state_sped'; }else{ $order['state_sped'] = $_POST['state_sped']; }
//    if(empty($_POST['country_sped'])){ $error[] = 'country_sped'; }else{ $order['country_sped'] = $_POST['country_sped']; }
//    if(empty($_POST['city_sped'])){ $error[] = 'city_sped'; }else{ $order['city_sped'] = $_POST['city_sped']; }
    if(empty($_POST['cap_sped'])){ $error[] = 'cap_sped'; }else{ $order['cap_sped'] = $_POST['cap_sped']; }
    if(empty($_POST['address_sped'])){ $error[] = 'address_sped'; }else{ $order['address_sped'] = $_POST['address_sped']; }
    
    $order['order_details'] = !empty($_POST['order_details']) ? intval($_POST['order_details']) : '0';
    $order['invoice_details'] = !empty($_POST['invoice_details']) ? intval($_POST['invoice_details']) : '0';
    
    if( !empty($order['invoice_details']) ){
        if(!empty($utente) && !empty($utente['agency_name']) && !empty($utente['agency_address']) && !empty($utente['agency_code']) ){
            $order['agency_name'] = $utente['agency_name'];
            $order['agency_address'] = $utente['agency_address'];
            $order['agency_code'] = $utente['agency_code'];
        }else{
            if( empty($_POST['agency_name']) ){ $error[] = 'agency_name'; }else{ $order['agency_name']=$_POST['agency_name']; }
            if( empty($_POST['agency_address']) ){ $error[] = 'agency_address'; }else{ $order['agency_address']=$_POST['agency_address']; }
            if( empty($_POST['agency_code']) ){ $error[] = 'agency_code'; }else{ $order['agency_code']=$_POST['agency_code']; }
        }
    }
    

    if( empty($_POST['policy']) ){ $error[] = 'pr'; }
    
    if( !count($error) ){
        //salva ordine
        if( !$id_ordine = $Ordini->aggiungi_ordine($order) ){
            header('Location: error.php');
            exit();
        }
        
        if( $order['order_details'] ){
            //invia mail con riepilogo ordine
//            echo 'INVIA MAIL <br/>';
            $order['totale'] =  number_format($order['costo_prodotto']+$order['costo_spedizione'], 2, '.', '');
            $data = htmlspecialchars(date('M d Y',  strtotime($order['data_spedizione'])));
            
            require_once './libs/mail/mail.php';
            $mail_txt = '<p>Your order has been confirmed.</p>'.
                    
                        "<p>Product: {$order['nome_prodotto']} <br/>".
                        "Date of delivery: {$data} </p>".
                                
                        "<p>Send To: {$order['cognome_sped']} {$order['nome_sped']}<br/>
                        {$order['state_sped']} - {$order['country_sped']} - {$order['city_sped']}<br/>
                        {$order['address_sped']}</p>".
                    
                        "<p>Amount: &euro; {$order['totale']}</p>";
                        
            invia_mail($mail_txt, 'YouMyWine - Order confirmed', 'noreply@youmywine.com', $order['email']);
        }
        
        $server_secret = '159456Agbshgd0k29ncq39jf492hjf';
        $token_verifica = md5("{$id_ordine}{$server_secret}{$id_ordine}");
        
        header('Location: order_confirm.php?id='.$id_ordine."&tk=".$token_verifica);
        exit();
    }
    
}




include './template/frontend/page.tpl.php';
?>