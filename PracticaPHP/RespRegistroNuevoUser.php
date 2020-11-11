<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
    <link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen">
    <link rel="stylesheet" href="cssModoNoche.css" title="Modo noche" media="screen">
    <link rel="stylesheet" href="cssImprimir.css" media="print">
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen">
    <link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen">    
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script>
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
