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
    $id_foto = mysqli_real_escape_string($conexion, $_GET['id']);
?>
    <title>Memories - LOGGED</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main id="mainuser">
      <article id="infogeneral">
        <h1 class="invisible">Infogeneral</h1>
          <img src="img.png" alt="icono" width="300" height="300">
          <section id>
            <h1> Bienvenido 
              <?php
                    
                   echo " $nombre";
                ?>
                </h1>
          <p>Info usuario lorem ipsum</p>
          <p>Info usuario lorem ipsum</p>
          <p>Info usuario lorem ipsum</p>
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
      <article id="infouser">
        <h1 class="invisible">Mi cuenta</h1>
         <!--<button href= "misalbumes.php"><a href= "misalbumes.php">Mis albums</a></button>
        <button>Mi perfil</button>-->
          <a href="misalbumes.php">Mis albumes</a>
          <a href="misalbumes.php">Mi perfil</a>
          <a href="añadirfoto.php">Añadir foto</a>
          <a href="crearAlbum.php">Crear album</a>
          <a href="SolicitarAlbum.php">Solicitar&nbsp;album</a> 
         <!-- <fieldset class="row">
            <legend>Al pulsar en mis albums</legend>
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
          </fieldset> -->
          <fieldset>
            <legend>Al pulsar en mi perfil</legend>
            <form action="RespRegistroNuevoUser.php" method = "post" class="formyera">
              <h1>Mis datos</h1>
              
                <p><label for="usuario" class="invisible">Usuario:</label >
                <?php
                        require("conexionBD.php");
                        $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
                        $sql = "SELECT * FROM USUARIOS WHERE IdUsuario='$id'";
                        $resultado = $conexion->query($sql);
                        $resultado_fetch = $resultado->fetch_assoc();

                        $nombre = $resultado_fetch['usuario'];
                        $email = $resultado_fetch['correo'];
                        $sexo = $resultado_fetch['sexo'];
                        $fecha = $resultado_fetch['fechnac'];
                        $estilo = $resultado_fetch['Estilo'];
                        $ciudad = $resultado_fetch['Ciudad'];
                        $pais = $resultado_fetch['Pais'];

                        echo "<input type='text' name='usuario' placeholder='$nombre' required>";
                        ?>
                
                <p><label for="contra" class="invisible">Contraseña:</label>
                <input type="password" id="contra" name="contra" required placeholder="contraseña"></p>
                
                <p><label for="repcontraseña" class="invisible">Repetir Contraseña:</label>
                <input type="password" id="repcontraseña" name="repcontraseña" required placeholder="repetir contraseña"></p>
                
                <p><label for="correo" class="invisible">Correo:</label>
                <?php
                  echo "<input type='email' name='email' placeholder='$email' required>";
                ?>
                
                <p><label for="sexo" class="invisible">Sexo</label>
                <select name="gender">
                            <?php
                            if ($sexo == "1") {
                                echo "<option value='hombre' selected>Hombre</option><option value='mujer'>Mujer</option><option value='otro'>Otro</option>";
                            }
                            if ($sexo == "2") {
                                echo "<option value='hombre'>Hombre</option><option value='mujer' selected>Mujer</option><option value='otro'>Otro</option>";
                            }
                            if ($sexo == "3") {
                                echo "<option value='hombre'>Hombre</option><option value='mujer'>Mujer</option><option value='otro' selected>Otro</option>";
                            }
                            ?>
                </select></p>
        
                <p><label for="fechnac">Fecha de Nacimiento</label>
                <?php
                    echo "<input type='date' name='fecha_nacimiento' value='$fecha'>";
                    ?></p>

                <label for="estilo" class="invisible">Estilo</label>
                            <p>
                                <select name="estilos">
                                    <?php
                                    if ($estilo == "1") {
                                        echo "<option value='1' selected>Estilo normal</option>";
                                        echo "<option value='2'>Estilo Alto contraste</option>";
                                        echo "<option value='3'>Estilo Letras Grandes y Contraste</option>";
                                        echo "<option value='4'>Estilo Letras Grandes</option>";
                                        echo "<option value='5'>Estilo Noche</option>";
                                    }
                                    if ($estilo == "2") {
                                      echo "<option value='1'>Estilo normal</option>";
                                        echo "<option value='2' selected>Estilo Alto contraste</option>";
                                        echo "<option value='3'>Estilo Letras Grandes y Contraste</option>";
                                        echo "<option value='4'>Estilo Letras Grandes</option>";
                                        echo "<option value='5'>Estilo Noche</option>";
                                    }
                                    if ($estilo == "3") {
                                      echo "<option value='1'>Estilo normal</option>";
                                        echo "<option value='2'>Estilo Alto contraste</option>";
                                        echo "<option value='3' selected>Estilo Letras Grandes y Contraste</option>";
                                        echo "<option value='4'>Estilo Letras Grandes</option>";
                                        echo "<option value='5'>Estilo Noche</option>";
                                  }
                                  if ($estilo == "4") {
                                    echo "<option value='1'>Estilo normal</option>";
                                    echo "<option value='2'>Estilo Alto contraste</option>";
                                    echo "<option value='3'>Estilo Letras Grandes y Contraste</option>";
                                    echo "<option value='4' selected>Estilo Letras Grandes</option>";
                                    echo "<option value='5'>Estilo Noche</option>";
                                  }
                                  if ($estilo == "5") {
                                    echo "<option value='1'>Estilo normal</option>";
                                        echo "<option value='2'>Estilo Alto contraste</option>";
                                        echo "<option value='3'>Estilo Letras Grandes y Contraste</option>";
                                        echo "<option value='4'>Estilo Letras Grandes</option>";
                                        echo "<option value='5' selected>Estilo Noche </option>";
                                }
                                    ?>
                                </select>
                            </p>

                <p><label for="pais"  class="invisible">Pais de residencia:</label>
                <select name="paises">
                            <?php
                            $sql = "SELECT * FROM PAISES";
                            $resultados = $conexion->query($sql);

                            while ($fila = $resultados->fetch_assoc()) {

                                $id_fila_pais = $fila['id'];
                                $fila_pais = $fila['nombre'];

                                if ($fila['id'] == $pais)
                                    echo "<option value='$id_fila_pais' selected>$fila_pais</option>";
                                else {
                                    echo "<option value='$id_fila_pais'>$fila_pais</option>";
                                }
                            }
                            ?>

                        </select></p>
                <p><label for="ciudad"  class="invisible">Ciudad:</label>
                <?php
                        echo "<input type='text' name='ciudad' placeholder='$ciudad'></label>";
                        ?></p>
        
                <p><label for="foto">Foto perfil</label>
                <input type="file" name="foto" id="foto" required></p>
                
                <p class="enviar"><input type="submit" id="enviar" name="enviar">
                <input type="reset" id="borrar" name="Borrar"></p>
            </form>
            <p><button value="borrar cuenta">Borrar cuenta</button><a href="SolicitarAlbumsend.php"></a></p>
          </fieldset>

         
        </article> 
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
