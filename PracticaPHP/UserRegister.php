    <!DOCTYPE html>
<html lang="es">
  <head>

  <?php
    include("eleccionEstilo.php");
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
                  echo "<h1>Bienvenido";
                  echo " $nombre</h1>";
                  $newdate = date("d-m-Y", strtotime($registro));
                  echo "<p>Te uniste el $newdate </p>";
                ?>
                <form method="post" class="formyera">
          <input type="submit" name="eliminarfoto" id="eliminarfoto" value="EliminarFotoPerfil" /><br/>
          </form>

          <?php

            function eliminarfoto()
            {
              require("conexionBD.php");
              $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
              $sql = "UPDATE usuarios
              SET Foto = 'anonymus.jpeg'
              WHERE IdUsuario = '$id'";

            if ($conexion->query($sql) === TRUE) {

            }
          }

            if(array_key_exists('eliminarfoto',$_POST)){
              eliminarfoto();
            }
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
      <article id="infouser">
        <h1 class="invisible">Mi cuenta</h1>
         <!--<button href= "misalbumes.php"><a href= "misalbumes.php">Mis albums</a></button>
        <button>Mi perfil</button>-->
          <a href="misalbumes.php">Mis albumes</a>
          <a href="misalbumes.php">Mi perfil</a>
          <a href="añadirfoto.php">Añadir foto</a>
          <a href="crearAlbum.php">Crear album</a>
          <a href="SolicitarAlbum.php">Solicitar&nbsp;album</a> 
          <a href="configurarestilo.php">Configurar</a>
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
            <form action="ResDatosUser.php" method = "post" class="formyera" enctype="multipart/form-data">
              <h1>Mis datos</h1>
              
                <p><label for="usuario" class="invisible">Usuario:</label >
                <?php
                        echo "<input type='text' name='usuario' placeholder='$nombre' required>";
                        ?>
                
                <p><label for="contra" class="invisible">Contraseña:</label>
                <input type="password" id="contra" name="contra" required placeholder="contraseña"></p>
                
                <p><label for="repcontraseña" class="invisible">Repetir Nueva Contraseña:</label>
                <input type="password" id="repcontraseña" name="repcontraseña" required placeholder="Nueva contraseña"></p>

                <p><label for="passcorrecta" class="invisible">Verificar Contraseña:</label>
                <input type="password" id="passcorrecta" name="passcorrecta" required placeholder="Verificar contraseña actual"></p>
                
                <p><label for="correo" class="invisible">Correo:</label>
                <?php
                  echo "<input type='email' name='correo' placeholder='$email' required>";
                ?>
                
                <p><label for="sexo" class="invisible">Sexo</label>
                <select name="sexo">
                            <?php
                            if ($sexo == "1") {
                                echo "<option value='1' selected>Hombre</option><option value='2'>Mujer</option><option value='3'>Otro</option>";
                            }
                            if($sexo == "2") {
                                echo "<option value='1'>Hombre</option><option value='2' selected>Mujer</option><option value='3'>Otro</option>";
                            }
                            if ($sexo == "3") {
                                echo "<option value='1'>Hombre</option><option value='2'>Mujer</option><option value='3' selected>Otro</option>";
                            }
                            ?>
                </select></p>
        
                <p><label for="fechnac">Fecha de Nacimiento</label>
                <?php
                    echo "<input type='date' name='fechnac' value='$fecha'>";
                    ?></p>

                <label for="Estilo" class="invisible">Estilo</label>
                            <p>
                                <select name="Estilo">
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
                <p><label for="Ciudad"  class="invisible">Ciudad:</label>
                <?php
                        echo "<input type='text' name='Ciudad' placeholder='$ciudad'></label>";
                        ?></p>
        
                <p><label for="foto">Foto perfil</label>
                <input type="file" name="input_foto" id="foto"></p>
                
                <p class="enviar"><input type="submit" id="enviar" name="enviar">
                <input type="reset" id="borrar" name="Borrar"></p>
            </form>
            <a href="DarmeBaja.php" style='text-decoration:none;'><h2>Borrar cuenta<h2></a>
          </fieldset>

         
        </article> 
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
