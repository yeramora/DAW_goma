<?php

setlocale(LC_TIME, "spanish");
require("conexionBD.php");
$id_album = mysqli_real_escape_string($conexion, $_GET['album']);


$sql = "SELECT * FROM fotos WHERE Album=$id_album";

$resultados = $conexion->query($sql);



$sql2 = "SELECT min(Fecha) as minFecha, max(Fecha) as maxFecha FROM fotos WHERE Album=$id_album";
$resultados_fecha = $conexion->query($sql2);

$row_fechas = $resultados_fecha->fetch_assoc();

$sql3 = "SELECT * FROM albumes WHERE IdAlbum=$id_album";
$resultados_album = $conexion->query($sql3);
$fila_album = $resultados_album->fetch_assoc();


$sql4 = "SELECT distinct Pais FROM fotos WHERE Album=$id_album";
$resultados_paises = $conexion->query($sql4);


$array_paises = array();

while ($row_paises = $resultados_paises->fetch_assoc()) {
    $id_pais = mysqli_real_escape_string($conexion, $row_paises['Pais']);
    $sql5 = "SELECT nombre FROM paises WHERE Id=$id_pais";
    $resultados_nombres_paises = $conexion->query($sql5);
    $res_paises_fetch = $resultados_nombres_paises->fetch_assoc();
    array_push($array_paises, $res_paises_fetch['nombre']);
}

$nombre_album = $fila_album['Titulo'];
$descrip_album = $fila_album['Descripcion'];
$min_fecha = $row_fechas['minFecha'];
$max_fecha = $row_fechas['maxFecha'];


$fecha_remp_min = str_replace("/", "-", $min_fecha);
$fecha_format_min = date("d-m-Y", strtotime($fecha_remp_min));

$fecha_remp_max = str_replace("/", "-", $max_fecha);
$fecha_format_max = date("d-m-Y", strtotime($fecha_remp_max));

echo "<h2 class=\"white\">$nombre_album</h2>";
echo "<div class=\"fecha_album\"><strong>$fecha_format_min</strong> | <strong>$fecha_format_max</strong></div>";
echo "<p style='text-align: center' class='white'>$descrip_album</p>";

echo "<div class=\"info_paises\">";

foreach ($array_paises as $pais) {
    echo "$pais";
    if ($pais !== end($array_paises)) {
        echo ", ";
    }
}

echo "</div>";
if(!isset($resultados)){
    echo "<p>No hay fotos</p>";
}
while ($fila = $resultados->fetch_assoc()) {
    $id = $fila['IdFoto'];
    $fichero = $fila['Fichero'];
    $titulo = $fila['Titulo'];
    $descripcion = $fila['Descripcion'];
    $paisBuscar = mysqli_real_escape_string($conexion, $fila['Pais']);
    $fecha = $fila['FRegistro'];
    $sqlPais = "SELECT * FROM PAISES WHERE id = '$paisBuscar'";
    $pais = $conexion->query($sqlPais);
    $paisNom = $pais->fetch_assoc();
    $paisNom2 = $paisNom['nombre'];
    
    echo "<a href='fotodetalle.php?id=$id'><img src='img/$fichero' width='300' height='300'></a><h2>$titulo</h2><p>$descripcion</p><p> Pais:$paisNom2</p><p>Fecha: $fecha</p>";
}
?>