<?php

//ob_start();
$template = array();
$template['page'] = 'home.tpl.php';


require_once './libs/db/Categorie.php';
$Categorie = new Categorie();

$img_categorie_path = 'images/img_categorie/';


$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);

$params['special'] = '1';
$categorie_special = $Categorie->lista_categorie(0, $params);

require_once './libs/db/Locations.php';
$Locations = new Locations();
$params_location = array( 'mostrainhome'=>'1' );
$available_cities = $Locations->lista_locations($params_location);


include './template/frontend/home.tpl.php';
?>