<?php

$template = array();
$template['page'] = 'category.tpl.php';


require_once './libs/db/Categorie.php';
$Categorie = new Categorie();





$img_categorie_path = 'images/img_categorie/';

if(!array_key_exists('id', $_GET)){
    header('Location: index.php');
    exit;
}


if( !$categoria = $Categorie->get_categoria($_GET['id']) ){
    header('Location: index.php');
    exit;
}

/**** per l'header***/
$params = array();
$params['special'] = '0';
$categorie_normali = $Categorie->lista_categorie(0, $params);
foreach ($categorie_normali as $key => $categoria_n) {
    if($categoria_n['id_categoria']==$categoria['id_categoria']){
        $categoria_n['active'] = TRUE;
    }else{
        $categoria_n['active'] = FALSE;
    }
    $categorie_normali[$key] = $categoria_n;
}
/******************/




$sottocategorie = $Categorie->lista_categorie($categoria['id_categoria']);
foreach ($sottocategorie as $key => $element) {
    $element['descrizione'] = str_replace("\n", '<br/>', $element['descrizione']);
    $sottocategorie[$key] = $element;
}

if(!count($sottocategorie)){
    header("Location: location.php?id={$categoria['id_categoria']}");
    exit();
}




include './template/frontend/page.tpl.php';
?>