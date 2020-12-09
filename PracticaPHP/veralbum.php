<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include("eleccionEstilo.php");
    $id_album = mysqli_real_escape_string($conexion, $_GET['album']);
    ?>
    <title>Memories - Album</title>
  </head>
  <body>
  <?php 
    include('header.php');
  ?>
<main id="mainuser">
    <article id="infouser">
    
    <a href="misalbumes.php">Ver mis albumes</a> 
    <a href="misfotos.php">Ver mis fotos</a>  
    <?php
    echo "<a href='añadirFoto.php?album=$id_album'>Añadir Foto</a>  
    <section>"
    ?>
    <?php
    include('veralbumfuncion.php');
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
