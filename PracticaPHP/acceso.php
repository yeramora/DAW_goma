<?php

$username = $_POST['username'];
$password = $_POST['password'];

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
);






if ($flag == 1 || $flag == 0){
    header('Location: index.php?error');
}
else{

	// Comprobamos si esta marcada la casilla de recuerdame para añadir la cookie
	if($_POST['recuerdame']=="on"){
		session_start();
		$_SESSION['sesion'] = $datos;
		
	}else{
		session_start();
		$_SESSION['sesion'] = $datos;
	}
    header('Location: UserRegister.php');
}