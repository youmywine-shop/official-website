<?php

$template = array();
$template['page'] = 'productlist.tpl.php';


require_once './libs/db/Categorie.php';
require_once './libs/db/Prodotti.php';
$Categorie = new Categorie();
$Prodotti = new Prodotti();


$img_prodotti_path = 'images/img_prodotti/';

if( empty($_GET['c']) || !intval($_GET['c']) || empty($_GET['l']) || !intval($_GET['l']) ){
    header('Location: index.php');
    exit;
}

/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);

$categoria_principale = $Categorie->get_categoria($_GET['c']);

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




$params = array();
$params['id_categoria'] = intval($_GET['c']);
$params['id_location'] = intval($_GET['l']);

$lista_prodotti = $Prodotti->lista_prodotti($params);
foreach ($lista_prodotti as $key => $element) {
    $element['descrizione'] = str_replace("\n", '<br/>', $element['descrizione']);
    $lista_prodotti[$key] = $element;
}


include './template/frontend/page.tpl.php';
?>