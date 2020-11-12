<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
    <link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen">
    <link rel="stylesheet" href="cssModoNoche.css" title="Modo noche" media="screen">
    <link rel="stylesheet" href="cssImprimir.css" media="print">
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen"> 
    <link rel="stylesheet" href="ContrasteLetras.css" title="LetrasGrandes" media="screen"> 
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script> 
    <meta charset="UTF-8">
    <title>Crear album</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <form action="UserRegister.php" method = "get" class="formyera">
        <h1>Crea tu album</h1>
          <p><label for="titulo" class="invisible">Titulo</label>
          <input type="text" id="titulo" name="titulo" placeholder="titulo"></p>
  
          <textarea name="desc" rows="10" cols="30" placeholder="Descripcion"></textarea>
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