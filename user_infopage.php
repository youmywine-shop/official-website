	<?php

	ob_start();
		$template = array();
		$template['page'] = 'user-infopage.tpl.php';



	include './template/frontend/user.tpl.php';
	?>