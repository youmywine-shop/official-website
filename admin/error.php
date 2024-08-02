<?php

//require_once 'verifica_login.php';

ob_start();
$template = array();
$template['content'] = '';
$template['title'] = 'Area Amministratore';
?>

<h1>Errore</h1>

<p>

    <?php
    //se l'accesso alla pagina avviene senza fornire un codice
    if (empty($_GET['code'])) {
        $code = 0;
    }


    $code = $_GET['code'];

    switch ($code) {
        case 0:
            echo 'errore nell accesso alla pagina';
            break;

        case 1:
            echo 'i dati non sono stati forniti in modo corretto';
            break;

        case 2:
            echo 'Non è stato possibile aggiungere l\'amministratore';
            break;

        case 3:
            echo 'Non è stato possibile accedere all\'amministratore';
            break;

        case 4:
            echo 'Non è stato possibile modificare l\'amministratore';
            break;

        case 5:
            echo 'Non è stato possibile eliminare l\'amministratore';
            break;

        case 6:
            echo 'Non è stato possibile aggiungere la categoria';
            break;

        case 7:
            echo 'Non è stato possibile accedere alla categoria';
            break;

        case 8:
            echo 'Non è stato possibile modificare la categoria';
            break;

        case 9:
            echo 'Non è stato possibile eliminare la categoria';
            break;

        case 10:
            echo 'Non è stato possibile aggiungere la location';
            break;

        case 11:
            echo 'Non è stato possibile accedere alla location';
            break;

        case 12:
            echo 'Non è stato possibile modificare la location';
            break;

        case 13:
            echo 'Non è stato possibile eliminare la location';
            break;

        case 14:
            echo 'Non è stato possibile aggiungere il prodotto';
            break;

        case 15:
            echo 'Non è stato possibile accedere al prodotto';
            break;

        case 16:
            echo 'Non è stato possibile modificare il prodotto';
            break;

        case 17:
            echo 'Non è stato possibile eliminare il prodotto';
            break;

        case 18:
            echo 'Non è stato possibile modificare l\'impostazione';
            break;

        case 19:
            echo 'Non è stato possibile accedere all\'utente';
            break;

        case 20:
            echo 'Non è stato possibile modificare l\'utente';
            break;

        case 21:
            echo 'Non è stato possibile eliminare l\'utente';
            break;

        case 22:
            echo 'Non è stato possibile accedere all\'ordine';
            break;

        case 23:
            echo 'Non è stato possibile modificare l\'ordine';
            break;

		case 24:
            echo 'Non è stato possibile eliminare l\'ordine';
            break;
    }
    ?>

</p>


<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';

?>