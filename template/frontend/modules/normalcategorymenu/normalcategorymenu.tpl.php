

<!--normalcategory-->
<ul class="normalCategory bkg-3">
    <?php
    foreach ($categorie_normali as $n_categoria) {
        $active = (isset($n_categoria['active'])&&$n_categoria['active']) ? 'nCactive' : '';
        echo <<<NC
            <li><a href="category.php?id={$n_categoria['id_categoria']}"><span class="{$active} bkg-0"><font class="none">BEST WINE </font>{$n_categoria['nome']}</span></a></li>
NC;
    }
    ?>
    
    
        <div class="clear"></div>
</ul>

