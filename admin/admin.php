<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['content'] = '';
$template['title'] = 'Area Amministratore';
?>


<style>
	.mainbox{
	display:block;
	margin:0 auto;
	text-align:center;
	}
	.box{
	display: inline-block;
	margin:5px 5px;
	width:30%;
	height:200px;
	overflow:hidden;
	border: 0px solid #CCC;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0px 0px 4px #ccc;
	-moz-box-shadow: 0px 0px 4px #ccc;
	box-shadow: 0px 0px 4px #ccc;
	}
	.box:hover{
	-webkit-box-shadow: 0px 0px 8px #333;
	-moz-box-shadow: 0px 0px 8px #333;
	box-shadow: 0px 0px 8px #333;
	}
	.box a{
	display: block;
	margin:0px 0px 0px 0px;
	padding-top:150px;
	width:100%; height:50px;
	background-size:110% auto;
	background-repeat:no-repeat;
	background-position: top;
	
	-moz-opacity: 0.36;
	opacity: 0.36;
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=36);
	border: none !important;
	}
	.box a:hover{
	-moz-opacity: 0.99;
	opacity: 0.99;
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=99);

	background-size:100% auto;
	background-repeat:no-repeat;
	border: none !important;
	}

</style>
<div class="mainbox">
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-category.png);" href="gestione_categorie.php">CATEGORIE</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-location.png);" href="gestione_locations.php">LOCATION</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-product.png);" href="gestione_prodotti.php">PRODOTTI</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-user.png);" href="gestione_utenti.php">UTENTI</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-order.png);"  href="gestione_ordini.php">ORDINI</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-admin.png);" href="gestione_amministratori.php">ADMIN</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-setting.png);" href="edit_impostazioni.php">IMPOSTAZIONI</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-suggerimenti.png);" href="edit_frasi.php">CONSIGLI<br />CARTOLINE</a>
    </div>
	<div class="box">
    	<a style="background-image:url(../template/backend/media/image/link-log.png);" href="logout.php">EXIT<br />Logout</a>
    </div>
	<div class="box" style="width:92.6% !important;">
    	<a style="background-image:url(../template/backend/media/image/link-site.png);" href="../index.php" target="_blank" >BACK TO SITE<br />visualizza il sito</a>
    </div>
</div>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';

?>