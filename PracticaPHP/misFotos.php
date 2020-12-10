<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include("eleccionEstilo.php");
    ?>
    <title>Memories - Albumes</title>
  </head>
  <body>
  <?php 
    include('header.php');
  ?>
<main id="mainuser">
    <article class="row">
    <?php
    require("conexionBD.php");
    $id_user = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
    $sql = "SELECT * FROM ALBUMES WHERE Usuario='$id_user'";
    $rest_albumes = $conexion->query($sql);
    $flag = 1;
    $par = 0;
    while ($fila = $rest_albumes->fetch_assoc()) {
        $id_album = mysqli_real_escape_string($conexion, $fila['IdAlbum']);
        $titulo_album = $fila['Titulo'];
        $descrip_album = $fila['Descripcion'];
      
            echo "<section class=\"info1\">
                <a class='info-link' href='verAlbum.php?album=$id_album'> <h2>$titulo_album</h2></a>
                <p>$descrip_album</p></section>";
        
        $sql = "SELECT * FROM FOTOS WHERE Album='$id_album' limit 3";
        $rest_fotos_albumes = $conexion->query($sql);
        while ($row = mysqli_fetch_assoc($rest_fotos_albumes)) {
            $id_fichero = $row['Fichero'];
            $id = $row['IdFoto'];
            $alt = $row['Alternativo'];
            echo "<a href='fotodetalle.php?id=$id'>
            <img src=\"img/$id_fichero\" alt='$alt' width='300' height='300'></a>";
            if ($flag == 6) {
                $flag = 0;
            }
            $flag++;
        }
        
        $par++;
    }
    ?>
    </article>
</main>
<footer>
    <h3><a href="acerca.php">Acerca</a></h3>
      Copyright &copy; DAW <time datetime="2020">2020</time>
</footer>
</body>
</html>
