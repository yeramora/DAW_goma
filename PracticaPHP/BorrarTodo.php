<!DOCTYPE html>
<html lang="es">
  <head>

  <?php
    include("eleccionEstilo.php");
    ?>
    <title>Darme de Baja</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main id="mainuser">
      <article id="infogeneral">
        <h1 class="invisible">Darse de baja</h1>
          <?php
           require("conexionBD.php");
          ?>    
      </article>
      <?php
        $pass = $_POST['contra'];
        if (isset($_SESSION['sesion'])) {
          require("conexionBD.php");
          $id_user = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
          $sql = "SELECT contra FROM usuarios WHERE IdUsuario='$id_user'";
          $resultado = $conexion->query($sql);
          $resultado_fetch = $resultado->fetch_assoc();
           $password = $resultado_fetch['contra'];
        }
        if ($pass == $password) {
            if (isset($_SESSION['sesion'])) {
                session_destroy();
            }
            setcookie("recuerdame", "", time() - 7776000);

            $sql = "DELETE FROM usuarios WHERE IdUsuario = $id_user";
            if ($conexion->query($sql) === TRUE) {
                echo "<h1> Te echaremos de menos :( </h1>";
                $sql = "DELETE FROM Albumes WHERE Usuario = $id_user";
                $conexion->query($sql);
            }

        }   else {
            echo "
            <h1> El password esta mal </h1>";
        }

        ?>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
