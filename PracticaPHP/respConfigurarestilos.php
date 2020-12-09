<!DOCTYPE html>
<html lang="es">
<head>

    <title>Álbum creado | myAlbum</title>
    <?php
    include("eleccionEstilo.php");
    ?>
</head>
<body>
<?php
include('header.php');
?>

<main id="mainuser">
    <section class="col-4 margin_auto padding20">
    <p>
        <h2 class="white text_shadow">Ha seleccionado su estilo de pagina</h2>
    </p>
        <?php
       include("conexionBD.php");

        $estilo = mysqli_real_escape_string($conexion, $_POST['Estilo']);
        $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
        echo "<p>Su nuevo estilo es:" . $estilo . "</p>";

        
        

        $sql = "UPDATE USUARIOS SET Estilo = $estilo where idUsuario = $id";

        if ($conexion->query($sql) === TRUE) {
            echo "Cambiado";
        }


        ?>
        <article id="infouser">
            <a href="UserRegister.php">Aceptar</a>
        </article>

</main>

</body>
</html>