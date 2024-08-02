<?php

function show_errors($error, $show_div_error=FALSE){
    if( count($error) ){
        if($show_div_error){
            echo '<div class="redAlarm"><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></div>';
        }
        echo '<script type="text/javascript">
                    var campi_errore = new Array();';
                    foreach ($error as $key => $campo) {
                        echo "campi_errore[$key] = '$campo'; ";
                    }
        echo        '$(function(){
                        for(var i=0; i<campi_errore.length; i++){
                            $(\'#\'+campi_errore[i]).addClass(\'error\');
                            $(\'#\'+campi_errore[i]).bind(\'change\', function(){
                                $(this).removeClass(\'error\');
                            });
                        }
                    });
                </script>';
    }
}

?>