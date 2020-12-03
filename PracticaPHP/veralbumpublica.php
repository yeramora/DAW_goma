<!DOCTYPE html>
<html lang="es">
  <head>
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
        } 
    }
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
    <section>
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
