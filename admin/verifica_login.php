<?php

if(!isset($_SESSION)){ session_start(); }

require_once '../libs/db/Amministratori.php';
$amministratori = new Amministratori();


if( empty($_SESSION['adm_mode']) || ($_SESSION['adm_mode']!='ON') || empty($_SESSION['id_amministratore']) ){
    header('Location: index.php');
    exit();
}

$logged_admin = $amministratori->get_amministratore($_SESSION['id_amministratore']);

?>