<!DOCTYPE html>
<html lang="es">
  <head>
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
    <title>Memories-RespuestaRegistro</title>
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
        $pass = $_POST['password'];
        $repetircontraseña = $_POST['repcontraseña'];
        $email = $_POST['correo'];

        if($pass !== $repetircontraseña){
            header('Location: registro.php?error=true');
        }
        echo "<p style='color:white;'>Usuario: ".$usuario."</p>";
        echo "<p style='color:white;'>Password: ".$pass."</p>";
        echo "<p style='color:white;'>Email: ".$email."</p>";

        ?>
    </section>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
