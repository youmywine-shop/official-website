<?php

require_once('class.phpmailer.php');
include_once("class.smtp.php");

function invia_mail($testo, $oggetto, $indirizzo_from, $indirizzo_to) {

    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
    $mail->IsSMTP(); // telling the class to use SMTP

    try {
        //$mail->Host       = "smtp.tiscali.it"; // SMTP server
//	  $mail->SMTPAuth  = true;
//	  $mail->Host       = "smtp.";
//	  $mail->Port = 25;
//	  $mail->Username ="noreply@ ";
//	  $mail->Password = "zzzzzzzz";



//        $mail->SMTPAuth = true;
//        $mail->Username = "pixosystems@gmail.com";
//        $mail->Password = "p1x0syst3ms";
//        $mail->CharSet = "UTF-8";
//        $mail->SMTPSecure = 'tls';
//        $mail->Host = 'smtp.gmail.com';
//        $mail->Port = 587;

        $mail->SMTPAuth = true;
        $mail->Host = "mail.youmywine.com"; // SMTP server
        $mail->Port = 25;
        $mail->Username = "noreply@youmywine.com";
        $mail->Password = "q1w2e3r4t5y6";

        $mail->IsHTML(true);

        //$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
        
        
//          $mail->SetFrom($indirizzo_from, ' ');
        $mail->SetFrom("noreply@youmywine.com");
        $mail->FromName = 'YOUMYWINE';

        $mail->Subject = $oggetto;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically


        if (!is_array($indirizzo_to)) {
            $tmp = $indirizzo_to;
            $indirizzo_to = array();
            $indirizzo_to[] = $tmp;
        }

        foreach ($indirizzo_to as $indirizzo) {
            $mail->ClearAddresses();
            $mail->AddAddress($indirizzo);

            $testo_mail = str_replace('[INDIRIZZO_TO]', $indirizzo, $testo);

            $testo_mail = '<html>'
                            . '<head>'
                                . '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'
                                . '<title>YouMyWine</title>'
                            . '</head>'
                            . '<body>'
                                . $testo_mail
                            . '</body>'
                        . '</html>';
            $mail->MsgHTML($testo_mail);

            $mail->Send();
//              return true; // da eliminare
        }





        return true;
    } catch (phpmailerException $e) {
//            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        return false;
    } catch (Exception $e) {
//          echo $e->getMessage(); //Boring error messages from anything else!
        return false;
    }
}

?>