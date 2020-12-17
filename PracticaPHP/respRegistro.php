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
    <section class="formyera">
        <?php
        include("conexionBD.php");

            if (isset($_GET['error'])) {

              if ($_GET['error'] == 'user') {
                  echo "<p>El usuario no tiene un formato válido</p>";
              }
              if ($_GET['error'] == 'pass') {
                  echo "<p>La contraseña no tiene un formato válido</p>";
              }
              if ($_GET['error'] == 'pass_repeat') {
                  echo "<p>Las contraseñas no coinciden</p>";
              }
              if ($_GET['error'] == 'email') {
                  echo "<p>El email no tiene un formato válido</p>";
              }
              if ($_GET['error'] == 'sexo') {
                echo "<p>El genero no tiene un formato válido</p>";
              }
              if ($_GET['error'] == 'fechanac') {
                echo "<p>La fecha de nacimiento no tiene un formato válido</p>";
              }
              echo "<a href='FormRegistro.php'>Volver al registro</p>";
            }
            else{
              
              include("FiltrarDatos.php");
              if($datosCorrectos){
                $tmp_name = $_FILES["input_foto"]["tmp_name"]; //ERROR FUTURO como no pilla el input no se sube bien a la bbdd
                $name_img = basename($_FILES["input_foto"]["name"]);
                $sql_count = "SELECT count(*) FROM usuarios";
                    $foto_count = $conexion->query($sql_count);
                    $foto_count_fetch = $foto_count->fetch_assoc();
                    $fichero_subido = $foto_count_fetch['count(*)']+1 . $usuario . $name_img ;
                    move_uploaded_file($tmp_name, "img/$fichero_subido");
                
                $salted = "32298u2fjhkjsdvnfskhvsiudh2u3894234sdfjvds".$esc_pass."2349F09WUFjjfjF0WJFGOJFOIW";

                $hashed = hash('sha512', $salted);
                
                $sql = "INSERT INTO usuarios (usuario, contra, correo, sexo, fechnac, Ciudad, Pais, Foto,FRegistro, Estilo)
                VALUES ('$esc_usuario', ' $hashed', '$esc_email', '$esc_sexo', '$esc_fechaN', '$esc_ciudad', '$esc_pais', '$fichero_subido', '$esc_fechaR', '$esc_estilo')";
                }
                if($conexion->query($sql) === TRUE){
                  echo "<h2>Registro Satisfactorio</h2>";
                echo "<p >Usuario: " . $usuario . "</p>";
                echo "<p>Email: " . $email . "</p>";
                echo "<p>Ciudad: " . $ciudad . "</p>";
                echo "<p>Pais: " . $pais . "</p>";
                echo "<p>Sexo: " . $sexo . "</p>";
                echo "<p>Estilo: " . $estilo . "</p>";
                echo "<p>Fecha: " . $fechaN . "</p>";
                echo "<p><img src='img/$fichero_subido' height='300' width='300'></img></p>";
                }
            }
            /*
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
 */
        ?>
    </section>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
