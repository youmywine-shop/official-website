<?php

function print_option_categorie( $managerSql , $id_categoria_padre, $livello, $id_categoria_selected=0, $id_categoria_da_escludere=NULL ){
    $spaziatore='';
    for($s=0;$s<$livello;$s++){$spaziatore.='_';}
    $categorie = $managerSql->lista_categorie($id_categoria_padre);
    for($i=0; $i<count($categorie); $i++){
        $categoria = $categorie[$i];
        if( !empty($id_categoria_da_escludere) && ($id_categoria_da_escludere==$categoria['id_categoria']) ){
            continue;
        }
        $categoria['nome'] = htmlspecialchars($categoria['nome']);
        $selected = ($categoria['id_categoria']==$id_categoria_selected) ? ' selected="selected" ' : '';
        echo "<option value=\"{$categoria['id_categoria']}\" $selected >$spaziatore [$livello] - {$categoria['nome']}</option>";
        print_option_categorie($managerSql, $categoria['id_categoria'], $livello+1, $id_categoria_selected, $id_categoria_da_escludere);
    }
}



function print_menu_categorie( $managerSql , $id_categoria_padre, $livello, $id_categoria_selected=0 ){
    $spaziatore='';
    $espandi_div = false;
    
    for($s=0;$s<$livello;$s++){$spaziatore.='_';}
    
    $categorie = $managerSql->lista_categorie($id_categoria_padre);
    $hide = ($id_categoria_padre) ? ' display: none; ' : '';
    
    $indice_colore = $livello%2;
    echo "<div style=\"$hide\" id=\"sub_cat_menu_{$id_categoria_padre}\" >";
    for($i=0; $i<count($categorie); $i++){
        $categoria = $categorie[$i];
        $selected = '';
        if($id_categoria_selected == $categoria['id_categoria']) {
            $selected =  '(*)';
            $espandi_div = true;
        }
        
        $categoria['nome'] = htmlspecialchars($categoria['nome']);
        echo "<a href=\"index.php?l=visualizza_categorie&cat={$categoria['id_categoria']}\">$spaziatore [$livello] - {$categoria['nome']}</a> $selected ";
        if( $managerSql->lista_categorie($categoria['id_categoria']) ){
            echo "<span onclick=\"javascript: show_hide_submenu({$categoria['id_categoria']});\" >[ + ]</span>";
        }
        echo "<br/>";
        $espandi_div = $espandi_div | print_menu_categorie($managerSql, $categoria['id_categoria'], ($livello+1), $id_categoria_selected);
    }
    echo "</div>";
    
    if($espandi_div){
        echo "<script type=\"text/javascript\">
                  $(document).ready(function(){
                      $('#sub_cat_menu_{$id_categoria_padre}').fadeIn(0, null);
                  });
              </script>";
    }
    
    return $espandi_div ;
}


function print_menu_categorie_simple( $managerSql ){
    
    $categorie = $managerSql->lista_categorie(0);
    
    
    //echo "<div style=\"$hide\" id=\"sub_cat_menu_{$id_categoria_padre}\" >";
    echo '<ul>';
    for($i=0; $i<count($categorie); $i++){
        $categoria = $categorie[$i];
        
        
        $categoria['nome'] = htmlspecialchars($categoria['nome']);
        echo "<div style=\"	background-color:#CCC;	width:100%;\"><li class=\"menu_cat_first_level\">
                <a href=\"index.php?l=visualizza_categorie&cat={$categoria['id_categoria']}\">{$categoria['nome']}</a>
              </li></div>";
        
        $sottocategorie = $managerSql->lista_categorie($categoria['id_categoria']);
        if( $sottocategorie ){
            echo '<ul>';
            foreach ($sottocategorie as $sottocategoria) {
                echo "<li><a href=\"index.php?l=visualizza_categorie&cat={$sottocategoria['id_categoria']}\">{$sottocategoria['nome']}</a></li>";
            }
            echo '</ul>';
            
        }
    }
    
    echo '</ul>';
    
    return 0 ;
}


?>
