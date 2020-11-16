<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories LOGGED</title>
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
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <article id="artfotos">
        <h1>Las ultimas fotos</h1>
          <section>
            <h2 class="invisible">section</h2>
          <a href="FotoDetalle.php?id=1"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="FotoDetalle.php?id=2"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="FotoDetalle.php?id=1"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="FotoDetalle.php?id=2"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="FotoDetalle.php?id=1"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          </section>
          <article id="busquedalogin">
            <h1>Busqueda</h1>
            <form action="ResBusqueda.php" method = "get" class="formyera">
            <p><label for="titulo" class="invisible">Titulo</label >
            <input type="text" id="titulo" name="titulo" placeholder="titulo"></p>
          </form>
          </article>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
