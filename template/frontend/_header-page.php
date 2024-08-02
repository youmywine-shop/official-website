	<!--header page-->

	<div id="preloader"></div>

	<div id="header" class="block-full">
		<div class="box-top bkg-0">
			<div id="logo"><img src="template/frontend/media/image/logo.png" onclick="javascript:location.href='index.php'" /></div>
			<ul id="mainmenu-top">
				<?php
                                include_once realpath(dirname(__FILE__).'/../../libs/load_login_user.php');
                                if(empty($utente)):
                                ?>
                                    <li><a href="user_login.php" target="_parent" title="">SIGN UP / LOGIN</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                <?php
                                else:
                                ?>
                                    <li><a href="user_profile.php" target="_parent" title="">WELLCOME <?php echo htmlspecialchars($utente['nome']); ?></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                    <li><a href="logout.php" target="_parent" title="">LOGOUT</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
                                <?php
                                endif;
                                ?>
				<li><a href="user_contact.php" target="_parent" title="">CONTACT</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li><a href="user_infopage.php" target="_parent" title="">INFO</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</li>
				<li>
					<div class="box-follow">
						<div class="followuslabel">FOLLOW US</div>
						<div class="followicon">
							<a class="followme fm_facebook" href="" target="_parent" title=""></a>
							<a class="followme fm_twitter"  href="" target="_parent" title=""></a>
							<a class="followme fm_google" href="" target="_parent" title=""></a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

