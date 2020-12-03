<!DOCTYPE html>
<html lang="es">
<head>
    <title>Respuesta subida foto | myAlbum</title>


    <?php
    include("eleccionEstilo.php");
    ?>
</head>
<body>
<?php
include('header.php');
?>

    <section class="formyera">
        <h2>Subida de imagen</h2>

        <?php
        //error_reporting(0);
        	include("conexionBD.php");
            $tmp_name = $_FILES["input_foto"]["tmp_name"]; //ERROR FUTURO como no pilla el input no se sube bien a la bbdd
            $name_img = basename($_FILES["input_foto"]["name"]);
            $fichero_subido = $name_img . ".jpg";
            move_uploaded_file($tmp_name, "img/$fichero_subido");


        	$fecha = date("Y-m-d", strtotime($_POST['fecha']));
	        $titulo = mysqli_escape_string($conexion,$_POST['titulo']);
	        $descripcion = mysqli_escape_string($conexion,$_POST['descripcion']);
	        $fecha = mysqli_escape_string($conexion,$fecha);
	        $pais = mysqli_escape_string($conexion,$_POST['paises']);
	        $album = mysqli_escape_string($conexion,$_POST['album']);
	        $textoAlternativo = mysqli_escape_string($conexion,$_POST['textoAlternativo']);
	        $fregistro = date('Y-m-d H:i:s');

	        echo "<p><h3>Titulo: </h3>" . $titulo . "</p>";
            echo "<p><h3>Descripcion: </h3>" . $descripcion . "</p>";
            echo "<p><h3>Fecha: </h3>" . $fecha . "</p>";
            echo "<p><h3>Pais: </h3>" . $pais . "</p>";
            echo "<p><h3>Album: </h3>" . $album . "</p>";
            echo "<p><h3>Texto Alternativo: </h3>" . $textoAlternativo . "</p>";
            echo "<p><h3>Fecha: </h3>" . $fecha . "</p>";
            echo "<p><h3>Fecha Registro: </h3>" . $fregistro . "</p>";


	        $sql = "INSERT INTO fotos(IdFoto,Titulo,Descripcion,Fecha,Pais,Album,Fichero,Alternativo,FRegistro) VALUES('NULL','$titulo','$descripcion','$fecha','$pais','$album',' $fichero_subido','$textoAlternativo','$fregistro')";

	        if($conexion->query($sql)){
	        	echo "<h2 class='white text_shadow'> Introducida con éxito</h3>";
	        }

            echo "<p><img src='$fichero_subido'></img></p>";

        


        ?>
    </section>

</body>
</html>