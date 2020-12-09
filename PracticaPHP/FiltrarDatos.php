<?php

require("conexionBD.php");
$datosCorrectos = true;

$exp_regular = "/^[A-Za-z0-9_-]{3,15}$/";
$exp_regular_pass = "/^[A-Za-z0-9_-]{6,15}$/";



$usuario = $_POST['usuario'];
if (!preg_match($exp_regular, $usuario)) {
    header('Location: respRegistro.php?error=user');
    $datosCorrectos = false;
}

$pass = $_POST['contra'];
$pass_repeat = $_POST['repcontraseña'];
if (!preg_match($exp_regular_pass, $pass) || !preg_match($exp_regular_pass, $pass_repeat)) {
    header('Location: respRegistro.php?error=pass');
    $datosCorrectos = false;
}
if ($pass !== $pass_repeat) {
    header('Location: respRegistro.php?error=pass_repeat');
    $datosCorrectos = false;
}

$email = $_POST['correo'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: respRegistro.php?error=email');
    $datosCorrectos = false;
}

$sexo = $_POST['sexo'];
if ($sexo != "hombre" && $sexo !="mujer" && $sexo != "otro") {
    header('Location: respRegistro.php?error=sexo');
    $datosCorrectos = false;
}
$hasta =  date('Y-m-d');

$fechaN = $_POST['fechnac'];

if($fechaN>$hasta){
    header('Location: respRegistro.php?error=fechanac');
    $datosCorrectos = false;
}

//$tmp_name = $_FILES["Foto"]["tmp_name"];
//$name_img = basename($_FILES["Foto"]["name"]);
$fichero_subido = $usuario . ".jpg";
$ciudad = $_POST['Ciudad'];
$pais = $_POST['paises'];
$estilo = $_POST['Estilo'];

$esc_usuario = mysqli_real_escape_string($conexion, $usuario);
$esc_pass = mysqli_real_escape_string($conexion, $pass);
$esc_email = mysqli_real_escape_string($conexion, $email);
$esc_ciudad = mysqli_real_escape_string($conexion, $ciudad);
$esc_pais = mysqli_real_escape_string($conexion, $pais);
$esc_sexo = mysqli_real_escape_string($conexion, $sexo);
$esc_estilo = mysqli_real_escape_string($conexion, $estilo);
$esc_fechaN = mysqli_real_escape_string($conexion, $fechaN);
$esc_fechaR = mysqli_real_escape_string($conexion, $hasta);



?>