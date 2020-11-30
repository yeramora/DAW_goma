<?php
session_start();
if (!isset($_SESSION['sesion'])) {
    header('Location:'.'index.php');
}else{
    
    if($_SESSION['sesion']['Estilo'] == "style"){
        include('meta.php');
    }else if($_SESSION['sesion']['Estilo'] == "Alto contraste"){
        include('metaAltContraste.php');
    }else if($_SESSION['sesion']['Estilo'] == "Contraste y Letras"){
        include('metaLetrasContraste.php');
    }else if($_SESSION['sesion']['Estilo'] == "Letras Grandes"){
        include('metaLetrasGrandes.php');
    }else if($_SESSION['sesion']['Estilo'] == "Modo Noche"){
        include('metaModoNoche.php');
    } else{
        include('meta.php');
    }
}
?>