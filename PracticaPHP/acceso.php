<?php

require("conexionBD.php");

$username = mysqli_real_escape_string($conexion, $_POST['username']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$recordar = "";
$salted = "32298u2fjhkjsdvnfskhvsiudh2u3894234sdfjvds".$password."2349F09WUFjjfjF0WJFGOJFOIW";
$hashed = hash('sha512', $salted);

$sql = "SELECT * FROM USUARIOS WHERE usuario='$username' and contra='$hashed'";
$resultados = $conexion->query($sql);

if ($resultados->num_rows > 0) {
	$datosUsu = $resultados->fetch_all(MYSQLI_ASSOC);
	$eleccion = $datosUsu[0]['Estilo'];

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
        "IdUsuario" => $datosUsu[0]['IdUsuario'],
        "usuario" => $datosUsu[0]['NomUsuario'],
        "pass" => $datosUsu[0]['Clave'],
        "tiempo" => getdate(),
		"Estilo" => $css, //$datosUsu[0]['Estilo'],
		"recordar" => $recordar,
    );

// Comprobamos si esta marcada la casilla de recuerdame para añadir la cookie

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

}else{

	header('Location: index.php?error');
}

