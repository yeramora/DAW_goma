<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Busqueda</title>
    <?php 
    include("eleccionEstilo.php");
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
  
          <p><label for="paisprod">Pais</label>
          <select name="paises">
                            <?php
                            require("rellenarPaises.php");

                            ?>

                        </select></p>
          
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