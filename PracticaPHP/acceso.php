<?php

$username = $_POST['username'];
$password = $_POST['password'];
$recordar = "";

$usuarios = ['usuario1', 'usuario2', 'usuario3', 'usuario4', 'usuario5'];
$passwords = ['usuario1', 'usuario2', 'usuario3', 'usuario4', 'usuario5'];

$bd = array_combine($usuarios, $passwords);
$flag = 0;

if (array_key_exists($username, $bd)) {
    $flag = 1;
    $passBD = $bd[$username];
}

if($password == $passBD){
    $flag = 2;
}



$eleccion = 1;
$css;

if($eleccion==1){
	$css = "style";
}else if($eleccion==2){
	$css = "Alto contraste";
}else if($eleccion==3){
	$css = "Contraste y Letras";
}else if($eleccion==4){
	$css = "Letras Grandes";
}else if($eleccion==5){
	$css = "Modo Noche";
}

$datos = array(
	"usuario" 		 => $username,
	"pass"    		 => $password,
	"tiempo"  		 => getdate(),
	"Estilo" 		 => $css,
	"recordar"		 => $recordar,
);






if ($flag == 1 || $flag == 0){
    header('Location: index.php?error');
}
else{

	// Comprobamos si esta marcada la casilla de recuerdame para añadir la cookie
	if($_POST['recuerdame']=="on"){
		setcookie("recuerdame", json_encode($datos), time() + 7776000);
		//Specify time = 0 or blank , when you do so, the cookie will expire as the browser is closed. 
		session_start();
		
		$_SESSION['sesion'] = $datos;
		$_SESSION['sesion']['recordar'] = "true";
		
		
	}else{
		$recordar="false";
		session_start();
		$_SESSION['sesion'] = $datos;
		$_SESSION['sesion']['recordar'] = "false";
	}
    header('Location: index_logged.php');
}