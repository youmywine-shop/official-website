<!--content content-->
<div id="content" class="block-full">

    <div class="block-full bkg-2">
        <div class="wrap">
	<div style="margin:-250px 0 200px 0;">
                <?php include "template/frontend/modules/normalcategorymenu/normalcategorymenu.tpl.php"; ?>
	</div>
	</div>
</div>

    <div class="box-slogan bkg-1">
        <div class="wrap">
            <h2 class="slogantitle">Follow your emotions...</h2>
            <p class="slogansubtitle">Choose the right wine for every occasion... Celebrate your special moments!</p>
        </div>
    </div>

    <div class="block-full bkg-2">
        <div class="wrap">

            

            <br /><br /><br />

            <ul class="specialCategory">
                <?php
                foreach ($categorie_special as $categoria) {
                    echo <<<CS
                        <li onclick="javascript:location.href ='category.php?id={$categoria['id_categoria']}'">
                            <img class="tobkg" src="images/img_categorie/{$categoria['id_categoria']}.png" alt="{$categoria['descrizione']}" />
                            <div style="width:100%; margin:0 0 -20px 0;">
                                <img style="width:100%" src="template/frontend/media/image/shw_001.png"/>
                            </div>
                            <a href="category.php?id={$categoria['id_categoria']}"><span class="bkg-0"><img style="width:29px; margin:-9px 3px 9px 0;" src="template/frontend/media/image/wine.png" alt="best wine"/>{$categoria['nome']}</span></a>
                        </li>
CS;
                }
                ?>
                <div class="clear"></div>
            </ul>

            <br /><br />

        </div>
    </div>

</div>

