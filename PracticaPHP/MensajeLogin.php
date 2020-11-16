<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories - Formulario de Login</title>
    <?php 
    if (isset($_SESSION['sesion'])) {
        header('Location:'.'index.php');
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
          <h1>Inicia sesion</h1>
            <p><label for="username">Usuario:</label><input type="text" placeholder="usuario" id="username" name="username" ></p>
          <p><label for="password">Contraseña:</label><input type="password" placeholder="password" id="password"  name="password"></p>
        <p  class="enviar"><input type="submit" value="Submit"></p>
        <a href="index.php">¿Has olvidado tu contraseña?</a>
        </form>
    </main>
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>