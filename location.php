<?php

$template = array();
$template['page'] = 'location.tpl.php';



require_once './libs/db/Locations.php';
require_once './libs/db/Categorie.php';
$Locations = new Locations();
$Categorie = new Categorie();



$img_locations_path = 'images/img_locations/';

if(!array_key_exists('id', $_GET)){
    header('Location: index.php');
    exit;
}

if( !$categoria = $Categorie->get_categoria($_GET['id']) ){
    header('Location: index.php');
    exit();
}



/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);

$categoria_principale = array_merge(array(), $categoria);

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


$id_location_padre = array_key_exists('l', $_GET)&& intval($_GET['l']) ? intval($_GET['l']) : '';

$lista_locations = $Locations->lista_locations_by_categoria($categoria['id_categoria'], $id_location_padre);
if ( !count($lista_locations)){
    header('Location: index.php');
    exit();
}


include './template/frontend/page.tpl.php';
?>