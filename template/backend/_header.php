

	<!--header user-->

	<div id="preloader"></div>

	<div id="header" class="block-full">
		<div class="box-top bkg-0">
			<div id="logo"><img src="../template/backend/media/image/logo.png" onclick="javascript:location.href='index.php'" /></div>
                        
                        <?php if(isset($logged_admin)&&!empty($logged_admin)): ?>
			<ul id="mainmenu-top">
				<li><a href="gestione_categorie.php" target="_parent" title="">CATEGORIE</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li><a href="gestione_locations.php" target="_parent" title="">LOCATION</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li><a href="gestione_prodotti.php" target="_parent" title="">PRODOTTI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li><a href="gestione_utenti.php" target="_parent" title="">UTENTI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                <li><a href="gestione_ordini.php" target="_parent" title="">ORDINI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li><a href="gestione_amministratori.php" target="_parent" title="">AMMINISTRATORI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                
                                <li><a href="edit_impostazioni.php" target="_parent" title="">IMPOSTAZIONI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                <li><a href="edit_frasi.php" target="_parent" title="">FRASI</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                
				<li><a href="logout.php" target="_parent" title="">LOGOUT</a></li>
			</ul>
                        <?php endif; ?>
		</div>
	</div>

