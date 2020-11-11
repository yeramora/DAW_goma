<!DOCTYPE html>
<html lang="es">
  <head>
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script>
    <script src="codigoyera.js"></script>
    <link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
    <link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen">
    <link rel="stylesheet" href="cssModoNoche.css" title="Modo noche" media="screen"> 
    <link rel="stylesheet" href="cssImprimir.css" media="print"> 
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen"> 
    <link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen"> 
    <meta charset="UTF-8">
    <title>Formulario de Login</title>
  </head>
  <body>
  <?php 
    include('headersinlogear.php');
    ?>
    <main>
        <form class="formyera" name="formulario" action="/index_logged.html" onsubmit="return validateForm()">
          <h1>Inicia sesion</h1>
            <p><label for="username">Usuario:</label><input type="text" placeholder="usuario" id="username" name="username" ></p>
          <p><label for="password">Contraseña:</label><input type="password" placeholder="password" id="password"  name="password"></p>
        <p  class="enviar"><input type="submit" value="Submit"></p>
        <a href="index.html">¿Has olvidado tu contraseña?</a>
        </form>
    </main>
    <footer>
        <h3><a href="acerca.html">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>