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
    <article id="infouser">
    
    <a href="misalbumes.php">Ver mis albumes</a> 
    <a href="misfotos.php">Ver mis fotos</a>  
    <section>
    <?php
    require("conexionBD.php");
    $id_user = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
    $sql = "SELECT * FROM ALBUMES WHERE Usuario='$id_user'";
    $rest_albumes = $conexion->query($sql);
    $flag = 1;
    $par = 1;
    while ($fila = $rest_albumes->fetch_assoc()) {
        $id_album = mysqli_real_escape_string($conexion, $fila['IdAlbum']);
        $titulo_album = $fila['Titulo'];
        $descrip_album = $fila['Descripcion'];
        if ($par % 2 != 0) {
            echo "<h2>
                <a  class='extra' href='veralbum.php?album=$id_album'>$titulo_album</a></h2>
                <p>$descrip_album</p>";
        }
        /*   
        $sql = "SELECT Fichero FROM FOTOS WHERE Album='$id_album' limit 3";
        $rest_fotos_albumes = $conexion->query($sql);
        while ($row = mysqli_fetch_assoc($rest_fotos_albumes)) {
            $id_fichero = $row['Fichero'];
            $type_figure = "figure" . $flag;
            echo "<figure class=\"figure $type_figure\">
                <img class=\"figure-img\" src=\"img/$id_fichero\" alt=\"a kitten\"></figure>";
            if ($flag == 6) {
                $flag = 0;
            }
            $flag++;
        } */
        if ($par % 2 == 0) {
            echo "<h2>
            <a  class='extra' href='veralbum.php?album=$id_album'>$titulo_album</a></h2>
                <p>$descrip_album</p>";
        }
        $par++; 
    }
    ?>  
    </section>
    
</article>    
</main>
<footer>
    <h3><a href="acerca.php">Acerca</a></h3>
      Copyright &copy; DAW <time datetime="2020">2020</time>
</footer>
</body>
</html>
