<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Busqueda</title>
    <?php 
    if (isset($_SESSION['sesion'])) {
      header('Location:'.'index_logged.php');
  }
?>
<?php 
        include('meta.php');
    ?>
  </head>
  <body>
  <?php 
    include('headersinlogear.php');
    ?>
    <main>
            <form class="formyera" name="formulario" action="acceso.php" method = "post" onsubmit="return validateForm()">
              <h2>Tienes que estar logeado para acceder a esta informacion</h2>
              <p><label for="username">Usuario:</label><input type="text" placeholder="usuario" id="username" name="username" ></p>
            <p><label for="password">Contraseña:</label><input type="password" placeholder="password" id="password"  name="password"></p>

              <p class="enviar"><input type="submit" value="Login"></p>
              <a href="index.php">¿Has olvidado tu Contraseña?</a>
                <h2>¿Aun no estas registrado?</h2>
                <a href="FormRegistro.php"> <p>Registrate</p> </a>
            </form>
    </main>   
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>