<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories-RespuestaRegistro</title>
    <?php
    include('meta.php');
    ?>
  </head>
  <body>
  <?php 
    include('headersinlogear.php');
    ?>
    <main>
    <section class="col-4 margin_auto padding20">
        <?php
                $pass = $_POST['contra'];
                echo "<p;'>Sexo: " . $pass . "</p>";
        ?>
    </section>
    
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
