<?php

require_once './libs/db/Impostazioni.php';
require_once './libs/db/Ordini.php';
$Impostazioni = new Impostazioni();
$Ordini = new Ordini();


//echo 'ok db <br/>';

$impostazione_PAYPALMAIL = $Impostazioni->get_impostazione('PAYPALMAIL');
$impostazione_PAYPALTOKEN = $Impostazioni->get_impostazione('PAYPALTOKEN');

//echo 'ok impostazioni <br/>';


// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';

$tx_token = $_GET['tx'];


//$pp_hostname = 'www.sandbox.paypal.com';
$pp_hostname = "www.paypal.com";


$auth_token = $impostazione_PAYPALTOKEN['valore'];



$req .= "&tx=$tx_token&at=$auth_token";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//curl_setopt($ch, CURLOPT_CAINFO, 'verisign0.cer');
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
$res = curl_exec($ch);
//curl_close($ch);
 
//print_r($res);

if(!$res){
    //HTTP ERROR
    echo curl_error ( $ch ) .'<br/>';
    echo curl_getinfo ($ch);
}else{
     // parse the data
    $lines = explode("\n", $res);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
            list($key,$val) = explode("=", $lines[$i]);
            $keyarray[urldecode($key)] = urldecode($val);
        }
        // check the payment_status is Completed
        // check that txn_id has not been previously processed
        // check that receiver_email is your Primary PayPal email
        // check that payment_amount/payment_currency are correct
        // process payment
//        $firstname = $keyarray['first_name'];
//        $lastname = $keyarray['last_name'];
//        $itemname = $keyarray['item_name'];
//        $amount = $keyarray['payment_gross'];

//        foreach ($keyarray as $key => $value) {
//            echo "$key: $value <br/>";
//        }
        // check the payment_status is Completed
        if (strcmp($keyarray['payment_status'], "Completed") != 0) {
            //redirect
            exit('Il pagamento non è andato a buon fine... Riprovare o contattare l\'amministratore');
        }
        //echo 'ok payment status <br/>';


        // check that txn_id has not been previously processed
        // check that receiver_email is your Primary PayPal email
        if( strcmp($keyarray['receiver_email'], $impostazione_PAYPALMAIL['valore'] ) != 0 ){
            //redirect
            exit('Pagamento effettuato in modo illegale');
        }
//        echo 'ok receiver mail <br/>';

        
        $ordine = $Ordini->get_ordine($keyarray['item_number']);
        if(!$ordine){
            //redirect
            exit('Pagamento effettuato in modo illegale');
        }
//        echo 'ok order id <br/>';


        $ordine['totale']= number_format($ordine['costo_prodotto']+$ordine['costo_spedizione'], 2, '.', '');
        
        //echo "da pagare: {$ordine['totale']}<br/>";

        // check that payment_amount/payment_currency are correct
        if( strcmp($keyarray['mc_gross'], $ordine['totale'])  != 0 ){
            //redirect
            exit('Pagamento effettuato in modo illegale');
        }
        //echo 'ok importo da pagare <br/>';




        // process payment
        $ordine['stato_ordine'] = 'PAGATO';
        if(!$Ordini->modifica_ordine($ordine)){
            header('Location: error.php');
            exit();
        }
        //echo 'ok salvataggio pagamento effettuato <br/>';


        //----- INIZIO Stampa di conferma pagamento
//        $firstname = $keyarray['first_name'];
//        $lastname = $keyarray['last_name'];
//        $itemname = $keyarray['item_name'];
//        $itemnumber = $keyarray['item_number'];
//        $amount = $keyarray['mc_gross'];
//
//        echo ("<p><h3>Grazie per il pagamento</h3></p>");
//
//        echo ("<b>Dettagli del pagamento</b><br>\n");
//        echo ("<li>Name: $firstname $lastname</li>\n");
//        echo ("<li>Item: $itemname</li>\n");
//        echo ("<li>Item number: $itemnumber</li>\n");
//        echo ("<li>Amount: $amount</li>\n");
        //-- FINE stampa conferma pagamento

        //pagamento andato a buon fine. è possibile tornare alla pagina del profilo
        
//        header('Location: index.php'); //show pagina di conferma
        $template = array();
        $template['page'] = 'payment_confirm.tpl.php';
        
        include './template/frontend/page.tpl.php';
        exit();
        
    }else if (strcmp($lines[0], "FAIL") == 0) {
        // log for manual investigation
        //show pagina di errore
        $template = array();
        $template['page'] = 'payment_error.tpl.php';
        
        include './template/frontend/page.tpl.php';
        exit();
    }
    
}

?>