<?php 
	session_start();
	if(isset($_SESSION['sesion'])){
        session_destroy();
    }
    setcookie('tiempo',$date,time() - 86400 * 90);
    setcookie("recuerdame", "", time() - 7776000);
    header('Location: index.php');

?>