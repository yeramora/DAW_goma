<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include("eleccionEstilo.php");
    ?>
    <title>Crear album</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <form action="resCrearAlbum.php" method = "post" class="formyera">
        <h1>Crea tu album</h1>
          <p><label for="titulo" class="invisible">Titulo</label>
          <input type="text" id="titulo" name="titulo" placeholder="titulo"></p>
  
          <textarea name="descripcion" rows="10" cols="30" placeholder="Descripcion"></textarea>
          <p class="enviar"><input type="submit" id="crear" name="crear" value="crear">
          <input type="reset" id="borrar" name="Borrar"></p>
      </form>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>