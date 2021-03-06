<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Registro</title>
    <?php 
   if (isset($_COOKIE['sesion'])) {
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
    <h2 class="text_shadow" style="color:red;">
            <?php 
                if(isset($_GET['error'])){
                    echo "Error en el registro";
                }
            ?>
        </h2>
        
      <form name="registroform" action="respRegistro.php" method= "post" class="formyera" enctype="multipart/form-data">
        <h1>Registro</h1>
          <p><label for="usuario" class="invisible">Usuario:</label>
          <input type="text" id="usuario" name="usuario" placeholder="Usuario"/></p>
          
          <p><label for="contra" class="invisible">Contraseña:</label>
          <input type="password" id="contra" name="contra"  placeholder="contraseña"></p>
          
          <p><label for="repcontraseña" class="invisible">Repetir Contraseña:</label>
          <input type="password" id="repcontraseña" name="repcontraseña"  placeholder="repetir contraseña"></p>
          
          <p><label for="correo" class="invisible">Correo:</label>
          <input type="email" id="correo" name="correo"  placeholder="correo"></p>
          
          <p><label for="sexo" class="invisible">Sexo</label>
          <select id="sexo" name="sexo" >
            <option value="">Sexo</option>
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
            <option value="3">Otro</option>
          </select></p>

          <p><label class="label_blanco text_shadow">Estilo</label>
                <select name="Estilo">
                    <?php
                    require("rellenarEstilos.php");

                    ?>
                </select>
            </p>

          <p><label for="fechnac">Fecha de Nacimiento</label>
          <input type="date" id="fechnac" name="fechnac" value="2018-07-22" min="1920-01-01"  placeholder="fecha"></p>
  
          <p><label for="Pais">Pais de residencia:</label>
          <select name="paises">
                            <?php
                            require("rellenarPaises.php");

                            ?>

                        </select></p>
          <p><label for="Ciudad"  class="invisible">Ciudad:</label>
          <input type="text" id="Ciudad" name="Ciudad"  placeholder="ciudad"></p>
  
          <p><label for="Foto">Foto perfil</label>
          <input type="file" name="input_foto" id="input_foto"></p>
          
          <p class="enviar"><input type="submit" id="enviar" name="enviar">
          <input type="reset" id="borrar" name="Borrar"></p>
      </form>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>