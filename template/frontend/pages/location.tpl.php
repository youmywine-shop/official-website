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

            <br /><br />
            <p class="uorder" style="text-align:center;">Select the destination</p>
            <br />

            <ul class="locationList">
<?php

foreach ($lista_locations as $location) {
    $link = "productlist.php?c={$categoria['id_categoria']}&l={$location['id_location']}";
    if( $location['num_sublocations'] ){
        $link = "location.php?id={$categoria['id_categoria']}&l={$location['id_location']}";
    }
    $name = ($location['num_sublocations']) ? $location['state'] : $location['city'];
    echo <<<LOC
        <li onclick="javascript:location.href = '$link'">
            <div class="box-city">
                <div class="city">
                    <img class="tobkg" src="{$img_locations_path}{$location['id_location']}.png" alt="wine for you to {$location['state']},{$location['country']},{$location['city']}" />
                    <img src="template/frontend/media/image/markship.png" style="float:right; padding:10px 10px 0 0; height:48px; margin-bottom:-48px;" />
                    <div class="cityshadow"></div>
                    <div class="cityname">
                        <p>WINE TO</p>
                        <p>{$name}</p>
                    </div>
                </div>
                <a class="none" href="$link">{$categoria['nome']} LINK</a>
            </div>
            <div style="height:0px; overflow:visible; width:100%;">
                <img width="100%" style="margin:0 0 -23px 0; padding:0px 0px 0px 0px;" src="template/frontend/media/image/shw_001.png" />
            </div>
        </li>
LOC;
}

?>

                <!--Ripete elementi...-->

                <div class="clear"></div>


            </ul>

        </div>
    </div>

</div>

