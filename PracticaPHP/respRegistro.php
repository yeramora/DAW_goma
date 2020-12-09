<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories-RespuestaRegistro</title>
    <?php
    include("eleccionEstilo.php");
    ?>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
    <section class="col-4 margin_auto padding20">
        <br><br>
        <h2 class="white text_shadow">Registro Satisfactorio</h2>
        <br><br>

        <?php
        $usuario = $_POST['usuario'];
        $pass = $_POST['contra'];
        $repetircontraseña = $_POST['repcontraseña'];
        $email = $_POST['correo'];

        if($pass !== $repetircontraseña){
            header('Location: FormRegistro.php?error=true');
        }
        echo "<p style='color:black;'>Usuario: ".$usuario."</p>";
        echo "<p style='color:black;'>Password: ".$pass."</p>";
        echo "<p style='color:black;'>Email: ".$email."</p>";

        ?>
    </section>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
