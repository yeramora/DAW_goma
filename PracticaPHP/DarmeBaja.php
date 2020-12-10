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
           $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
           $sql = "SELECT * FROM USUARIOS WHERE IdUsuario='$id'";
           $resultado = $conexion->query($sql);
           $resultado_fetch = $resultado->fetch_assoc();
           $perfil = $resultado_fetch['Foto'];
           $registro = $resultado_fetch['FRegistro'];
           $nombre = $resultado_fetch['usuario'];
           $email = $resultado_fetch['correo'];
           $sexo = $resultado_fetch['sexo'];
           $fecha = $resultado_fetch['fechnac'];
           $estilo = $resultado_fetch['Estilo'];
           $ciudad = $resultado_fetch['Ciudad'];
           $pais = $resultado_fetch['Pais'];
            echo "<img src='img/$perfil' alt='tu foto de perfil' width='300' height='300'>";
          ?>
          <section>
            
              <?php
                  echo "<h1>Borrar tu cuenta, ";
                  echo " $nombre </h1>";
                  $newdate = date("d-m-Y", strtotime($registro));
                  echo "<p>Te uniste el $newdate </p>";
                ?>
          </section>
          <p class="white text_shadow" style="font-size: .7em;"> Última conexión: 
                <?php 

                    if (isset($_SESSION['sesion'])) {

                        if(isset($_COOKIE['tiempo'])){
                            $cookie = json_decode($_COOKIE['tiempo'],true);
                            echo $cookie['mday'] . " de " . $cookie['month'] . " de " . $cookie['year'] . " a las " . $cookie['hours'] .":". $cookie['minutes'];
                            $date = json_encode(getdate());
                            setcookie('tiempo',$date,time() + 86400 * 90);

                        }else{
                            echo "Nunca"; //cookies individuales por ordenador o por usuario
                            $date = json_encode(getdate());
                            setcookie('tiempo',$date,time() + 86400 * 90);

                        }
                        
                        
                    }
                ?>
            </p>
      </article>
      <article >
      <?php
                echo "<h1> Se eliminará tu cuenta con los siguientes datos</h1>";
                require("conexionBD.php");
                $total =0;
                
                $id_user = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
                $sql = "SELECT * FROM ALBUMES WHERE Usuario='$id_user'";
                $rest_albumes = $conexion->query($sql);
                $flag = 1;
                $par = 0;
                while ($fila = $rest_albumes->fetch_assoc()) {
                  $contador=0;
                    $id_album = mysqli_real_escape_string($conexion, $fila['IdAlbum']);
                    $titulo_album = $fila['Titulo'];
                    
                        echo "<section style='text-transform: uppercase;background: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin: 3em;'>
                            <a style='text-decoration:none;' href='verAlbum.php?album=$id_album'><h2> $titulo_album</h2></a>
                            ";
                    
                    $sql = "SELECT * FROM FOTOS WHERE Album='$id_album'";
                    $rest_fotos_albumes = $conexion->query($sql);
                    while ($row = mysqli_fetch_assoc($rest_fotos_albumes)) {
                        $contador=$contador+1;
                    }
                    echo "<p>Este album tiene un total de $contador fotos</p></section>";
                    $total=$total+$contador;
                    
                    $par++;
                }
                echo "<p>Tienes un total de <h2> $total fotos </h2></p></section>";

                echo "<p>Si estas seguro de esto, escribe tu contraseña</p>";
                echo "<form name=''registrobaja' action='BorrarTodo.php' method='post' class='formyera'>";
                echo "<p><label for='contra' class='invisible'>Contraseña:</label>
                <input type='password' id='contra' name='contra'  placeholder='contraseña' required value></p>";
                echo "<p class='enviar'><input type='submit' id='enviar' name='enviar'></p>";
                echo "</form>";
               

            ?>
       </article>  
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
