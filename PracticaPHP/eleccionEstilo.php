<?php
session_start();
if (!isset($_SESSION['sesion'])) {
    header('Location:'.'index.php');
}else{
    include("conexionBD.php");
       $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
   
       $sql = "SELECT Estilo FROM USUARIOS WHERE idUsuario='$id'";
       $resultados = $conexion->query($sql);

    if ($resultados->num_rows > 0) {
	    $datosUsu = $resultados->fetch_all(MYSQLI_ASSOC);
        $eleccion = $datosUsu[0]['Estilo'];
    }


    if($eleccion == 1){
        include('meta.php');
    }else if($eleccion == 2){
        include('metaAltContraste.php');
    }else if($eleccion == 3){
        include('metaLetrasContraste.php');
    }else if($eleccion == 4){
        include('metaLetrasGrandes.php');
    }else if($eleccion == 5){
        include('metaModoNoche.php');
    } else{
        include('meta.php');
    }
}
?>