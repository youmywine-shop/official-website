

<!--content content-->
<div id="content" class="block-full">
    <div class="bkg-1">
        <div class="wrap">
            <br />
            <?php include "template/frontend/modules/normalcategorymenu/normalcategorymenu.tpl.php"; ?>
            <br />
        </div>
    </div>


    <div class="block-full bkg-2">
        <div class="wrap">
            <br /><br /><br />
            <ul class="categoryList">

<?php
    foreach ($sottocategorie as $sottocategoria) {
        echo <<<CATEGORIA
                <li onclick="javascript:location.href = 'location.php?id={$sottocategoria['id_categoria']}'">
                    <div class="div-shw" style="display:block; width:100%; padding:0px 0px 0px 0px; margin:0px 0px 0px 0px;">
                        <div class="bkg-4 div-shw">
                            <img src="template/frontend/media/image/wave-1.png" alt="" />
                            <h2>{$sottocategoria['nome']}</h2>
                            <hr />
                            <p>{$sottocategoria['descrizione']}</p>
                        </div>
                        <img class="tobkg" src="{$img_categorie_path}{$sottocategoria['id_categoria']}.png" alt="the best selection of wines for TITLE" />
                        <div class="clear"></div>
                        <a class="none" href="">go to collection wine now &raquo;</a>
                    </div>
                    <img style="width:100%" src="template/frontend/media/image/shw_002.png"/>
                </li>
CATEGORIA;
    }
                
?>
                <!--Ripete elementi...-->

                <div class="clear"></div>
            </ul>
        </div>
    </div>

</div>

