<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Resultado busqueda</title>
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
    <section class="formyera">
        <h2 class="white text_shadow">Resultados de la búsqueda</h2>
        <br>
        <br>

        <?php
        if(isset($_GET['titulo'])){
          $titulo = $_GET['titulo'];
          echo "<p style='color:black;'>Nombre: '.$titulo.'</p> ";
        }else{

        }

        if(isset($_GET['fechprod'])){
          $fechproduccion = $_GET['fechprod'];
          echo "<p style='color:black;'>Desde: '.$fechproduccion.'</p>";
        }else{

        }
        if(isset($_GET['paisprod'])){
          $paisproduccion = $_GET['paisprod'];
          echo "<p style='color:black;'>País: '.$paisproduccion.'</p>";
        }else{

        }
        ?>
    </section>
      <article id="busquedarow">

        <h1 class="invisible">resultadobusqueda</h1>
        <section>
          <a href="FotoDetalle.php?id=1"><img src="img.png" alt="icono" width="300" height="200"></a>
          <a href="user.php"><i class="fas fa-user" aria-hidden="true">Usuario</i></a>
            <a href="album.php"><i class="fas fa-images" aria-hidden="true">NombreAlbum</i></a>
        </section>
        <section>
          <h1>Titulo foto</h1>
          <p><time datetime="2020">28/09/2020</time></p>
          <p>Pais: España</p>
        </section>
        
      </article>
      <article id="busquedarow">
        <h1 class="invisible">resultadobusqueda</h1>
        <section>
          <a href="FotoDetalle.php?id=2"><img src="img.png" alt="icono" width="300" height="200"></a>
          <a href="user.php"><i class="fas fa-user" aria-hidden="true">Usuario</i></a>
            <a href="album.php"><i class="fas fa-images" aria-hidden="true">NombreAlbum</i></a>
        </section>
        <section>
          <h1>Titulo foto</h1>
          <p><time datetime="2020">28/09/2020</time></p>
          <p>Pais: España</p>
        </section>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
