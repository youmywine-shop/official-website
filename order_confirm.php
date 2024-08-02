<?php

$template = array();
$template['page'] = 'order_confirm.tpl.php';


require_once realpath( dirname(__FILE__).'/libs/load_login_user.php' );

require_once './libs/db/Categorie.php';
require_once './libs/db/Prodotti.php';
require_once './libs/db/Ordini.php';
require_once './libs/db/Impostazioni.php';
$Categorie = new Categorie();
$Prodotti = new Prodotti();
$Ordini = new Ordini();
$Impostazioni = new Impostazioni();


/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);
/******************/




$id_ordine = !empty($_GET['id']) ? $_GET['id'] : '';
$ordine = $Ordini->get_ordine($id_ordine);
if(!$ordine){
    header('Location: index.php');
//    echo 'ordine non corretto';
    exit();
}
$ordine['totale']= number_format($ordine['costo_prodotto']+$ordine['costo_spedizione'], 2, '.', '');


$token_ricevuto = !empty($_GET['tk']) ? $_GET['tk'] : '';
$server_secret = '159456Agbshgd0k29ncq39jf492hjf';
$token_verifica = md5("{$id_ordine}{$server_secret}{$id_ordine}");
if(strcmp($token_ricevuto, $token_verifica)){
    header('Location: index.php');
//    echo 'token non corretto';
    exit();
}


$prodotto = $Prodotti->get_prodotto($ordine['id_prodotto']);
if(!$prodotto){
    header('Location: index.php');
//    echo 'prodotto non corretto';
    exit();
}



$impostazione_PAYPALMAIL = $Impostazioni->get_impostazione('PAYPALMAIL');
$impostazione_BONIFICO = $Impostazioni->get_impostazione('BONIFICO');

$impostazione_BONIFICO['valore'] = str_replace("\n", '<br/>', $impostazione_BONIFICO['valore']);


include './template/frontend/page.tpl.php';

?>