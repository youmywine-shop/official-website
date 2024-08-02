<?php

require_once 'verifica_login.php';

ob_start();
$template = array();
$template['title'] = 'YOUMYWINE | Amministrazione | Impostazioni | Modifica';
$template['content'] = '';


require_once '../libs/db/Impostazioni.php';
$Impostazioni = new Impostazioni();


$impostazione_PAYPALMAIL = $Impostazioni->get_impostazione('PAYPALMAIL');
$impostazione_PAYPALTOKEN = $Impostazioni->get_impostazione('PAYPALTOKEN');
$impostazione_BONIFICO = $Impostazioni->get_impostazione('BONIFICO');


$salvataggio_completato = 0;

if (array_key_exists('salva_paypalmail', $_POST)) {
    $impostazione_PAYPALMAIL['valore'] = array_key_exists('paypalmail', $_POST)? $_POST['paypalmail'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_PAYPALMAIL)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
}  elseif (array_key_exists('salva_paypaltoken', $_POST)) {
    $impostazione_PAYPALTOKEN['valore'] = array_key_exists('paypaltoken', $_POST)? $_POST['paypaltoken'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_PAYPALTOKEN)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
}  elseif (array_key_exists('salva_bonifico', $_POST)) {
    $impostazione_BONIFICO['valore'] = array_key_exists('bonifico', $_POST)? $_POST['bonifico'] : '';
    if(!$Impostazioni->modifica_impostazione($impostazione_BONIFICO)){
        header('Location: error.php?code=18');
        exit();
    }
    $salvataggio_completato = 1;
    
}

?>


<!--<h1>Impostazioni generali di sistema</h1>-->


    <?php
    if($salvataggio_completato){
        echo '<div class="greenAlarm"><p>Operation was completed successfully ...</p></div>';
    }
    ?>


    <form name="frm_paypalmail" id="frm_paypalmail" method="post" action="edit_impostazioni.php" class="frm_impostazione" >
        <h4>Modifica Email PAYPAL</h4>
        <p>
            <input type="text" name="paypalmail" id="paypalmail" value="<?php echo htmlspecialchars($impostazione_PAYPALMAIL['valore']); ?>" />
            <br/>
            <input type="submit" class="btn_mini_save" name="salva_paypalmail" id="salva_paypalmail" value="Salva" />
        </p>
        
    </form>

    
    <hr/>


    <form name="frm_paypaltoken" id="frm_paypaltoken" method="post" action="edit_impostazioni.php" class="frm_impostazione">
        <h4>Modifica Token PAYPAL</h4>
        <p>
            <input type="text" name="paypaltoken" id="paypaltoken" value="<?php echo htmlspecialchars($impostazione_PAYPALTOKEN['valore']); ?>" />
            <br/>
            <input type="submit" class="btn_mini_save" name="salva_paypaltoken" id="salva_paypaltoken" value="Salva" />
        </p>
    </form>
        
    
    <hr/>


    <form name="frm_bonifico" id="frm_bonifico" method="post" action="edit_impostazioni.php" class="frm_impostazione">
        <h4>Modifica Dati Bonifico</h4>
        <p>
            <textarea name="bonifico" id="bonifico"><?php echo htmlspecialchars($impostazione_BONIFICO['valore']); ?></textarea>
            <br/>
            <input type="submit" class="btn_mini_save" name="salva_bonifico" id="salva_bonifico" value="Salva" />
        </p>
    </form>
        
    
        
<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';
?>