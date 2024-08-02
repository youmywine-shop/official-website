<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

	<?php include realpath(dirname(__FILE__). "/_head.php" ); ?>

	</head>
	<body>

            <?php include "_header.php"; ?>

            <?php //include realpath(dirname(__FILE__).'/pages/'.$template['page']); ?>
            
            <!--content-->
            <div id="content" class="block-full">
                    <div class="bkg-1"><br /></div>
            </div>
            <div class="block-full bkg-2">

					<br />
                    <div class="wrap">
                            <h4 style="margin-top:10px;"><?php echo $template['title']; ?></h4>
                            <hr />

                            <?php echo $template['content']; ?>
                    </div>

            </div>
            

            <?php include "_footer.php"; ?>

	</body>

</html>