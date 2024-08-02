<?php

ob_start();
$template = array();
$template['content'] = '';
$template['title'] = 'Area Amministratore';


$error = false;

if(!isset($_SESSION)){ session_start(); }

if(array_key_exists('login', $_POST) && !empty( $_POST['password'] ) && !empty( $_POST['username'] ) ){
    require_once '../libs/db/Amministratori.php';
    $Amministratori = new Amministratori();
            
    $logged_admin = $Amministratori->verifica_amministratore($_POST['username'], $_POST['password']);
    if ( $logged_admin ){
        session_unset();
        $_SESSION['id_amministratore'] = $logged_admin['id_amministratore'];
        $_SESSION['adm_mode'] = 'ON';
    }else{
        session_destroy();
        $error = TRUE;
    }
}


if( !empty($_SESSION['adm_mode']) && ($_SESSION['adm_mode']=='ON') ){
    header('Location: admin.php');
    exit();
}

?>


<?php
if($error){
    echo '<div class="redAlarm"><p> ERROR &raquo; It has been an error occurred ... Please recheck.</p></div>';
}   
?>



    <div>
        <form id="frm_login" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <p>
                Username<br/>
                <input type="text" name="username" id="username" />
            </p>
            <p>
                Password<br/> 
                <input type="password" name="password" id="password" />
            </p>
          
            <p>
                <input type="submit" name="login" id="login" value="LogIn" />
            </p>
        </form>
        
        <p>
            <a href="../index.php">Torna alla Home Utente</a>
        </p>
    </div>



<?php
$template['content'] = ob_get_clean();
//include_once '../template/admin/standard.php';
include_once '../template/backend/admin.tpl.php';

?>