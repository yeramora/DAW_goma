<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories - Index</title>
    <?php 
    session_start();
    if (isset($_SESSION['sesion'])) {
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
        
    }else{
      include('meta.php'); 
        
    }
?>
  </head>
  <body>
  <?php 
    include('headersinlogear.php');
    ?>

      <main>
        <article id="artfotos">
          <h1>Las ultimas fotos</h1>
          <section>
            <h2 class="invisible">section</h2>
          <a href="MensajeModal.php"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.php"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.php"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.php"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.php"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>   
          </section>
        </article>
        <article id="busquedalogin">
          <h1>Busqueda</h1>
          <a href="ResBusqueda.php"><i class="fa fa-search" aria-hidden="true"></i></a>
          <label for="busqueda" class="invisible">Busqueda</label>
          <input type="text" name="busqueda" id="busqueda" required>
        </article>
      </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
