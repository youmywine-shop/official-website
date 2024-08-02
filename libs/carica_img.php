<?php

require_once 'wideimage/WideImage.php';

function load_image($cartella, $file, $name, $dimensioni=array()){
    $tipi_consentiti = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");
    if( in_array( $file['type'], $tipi_consentiti) ){
        
        
        $image = WideImage::load($file['tmp_name']);
        //echo 'immagine caricata - ';
        
        
        if(!empty($dimensioni)){
            foreach ($dimensioni as $dim) {
                $dim['width'] = (!empty($dim['width'])) ? $dim['width'] : $image->getWidth();
                $dim['height'] = (!empty($dim['height'])) ? $dim['height'] : $image->getHeight();
                $resized = $image->resize($dim['width'], $dim['height'], 'outside', 'any')->crop(0, 0,$dim['width'],$dim['height']);
                //echo " salvata ridimenzionata";
                $resized->saveToFile("{$cartella}{$dim['sottocartella']}/$name".'.png', 6, PNG_NO_FILTER);
            }
            return true;
        }else{
            $image->saveToFile($cartella.$name.'.png', 6, PNG_NO_FILTER);
            //echo " salvata non ridimenzionata";
            return true;
        }
        
        
    }else{
        return false;
    }
}

?>
