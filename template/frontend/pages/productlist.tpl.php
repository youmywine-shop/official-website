

<!--content-->
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
            <br />
            <ul class="productList">

<?php
foreach ($lista_prodotti as $prodotto) {
    echo <<<PRODOTTO
        <li>
            <div class="div-shw" style="display:block; width:100%; padding:0px 0px 0px 0px; margin:0px 0px 0px 0px;">
                <img class="tobkg" src="{$img_prodotti_path}{$prodotto['id_prodotto']}.png" alt="the best selection of wines for meeting friends" />
                <div class="bkg-4">
                    <img src="template/frontend/media/image/wave-2.png" alt="" />
                    <h2>{$prodotto['nome']}</h2>
                    <hr />
                    <p>{$prodotto['descrizione']}</p>
                    <hr />
                    <a class="buythis" href="cart.php?p={$prodotto['id_prodotto']}">BUY NOW</a>
                    <p>{$prodotto['prezzo']} &euro;</p>
                </div>

                <div class="clear"></div>
            </div>
            <img style="width:100%" src="template/frontend/media/image/shw_002.png"/>
        </li>
PRODOTTO;
}
?>

                <!--Ripete elementi...-->

                <div class="clear"></div>
            </ul>

        </div>

    </div>

</div>

