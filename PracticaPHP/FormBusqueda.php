<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Busqueda</title>
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
      <form action="ResBusqueda.php" method = "get" class="formyera">
        <h1>Busqueda</h1>
          <p><label for="titulo" class="invisible">Titulo</label >
          <input type="text" id="titulo" name="titulo" placeholder="titulo"></p>
  
          <p><label for="paisprod"  class="invisible">Pais</label>
          <input type="text" id="paisprod" name="paisprod" placeholder="pais"></p>
          
          <p><label for="fechprod">Fecha</label>
          <input type="date" id="fechprod" name="fechprod" value="2018-07-22" min="1920-01-01"></p>
          
          <p class="enviar"><input type="submit" id="buscar" name="Buscar" value="Buscar">
          <input type="reset" id="borrar" name="Borrar"></p>
      </form>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>