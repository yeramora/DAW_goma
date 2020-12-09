<?php
require("conexionBD.php");

$sql = "SELECT * from ESTILOS";
$resultados = $conexion->query($sql);

if ($conexion->errno) {
    echo "Problemas al establecer conexion";
}

while ($fila = $resultados->fetch_assoc()) {
    echo "<option value=" . "'" . $fila['IdEstilo'] . "'>" . $fila['Nombre'] . "</option>";

}

$conexion->close();
?>