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

<main>
    <section class="formyera">
        <br><br>
        <h2 class="white text_shadow">Se ha registrado la solicitud</h2>
        <br><br>
        <?php
        $titulo = mysqli_real_escape_string($conexion, $_POST['titulo']);
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $usuario = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
        $IdAlbum = "";
        echo "<p style='color:black;'>Título: " . $titulo . "</p>";
        echo "<p style='color:black;'>Descripcion: " . $descripcion . "</p>";
        echo "<p style='color:black;'>ID Usuario: " . $usuario . "</p>";


        include("conexionBD.php");

        $sql = "INSERT INTO ALBUMES(Titulo,Descripcion,Usuario) VALUES ('$titulo','$descripcion','$usuario')";

        if ($conexion->query($sql) === TRUE) {
            $sql = "SELECT * from ALBUMES where Usuario='$usuario'";
            $resultados = $conexion->query($sql);
            while ($fila = $resultados->fetch_assoc()) {
                if( $fila['Titulo']==$titulo){
                    $IdAlbum = $fila['IdAlbum'];
                }
                
            
            }
            
            echo "<a href='añadirfoto.php?album=$IdAlbum'>Añade fotos a tu Album! </a>";
        }


        ?>

    </section>
</main>

</body>
</html>