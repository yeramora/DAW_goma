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
        
      <form name="registroform" action="respRegistro.php" method= "post" class="formyera"  onsubmit="return validaformulario()">
        <h1>Registro</h1>
          <p><label for="usuario" class="invisible">Usuario:</label>
          <input type="text" id="usuario" name="usuario" placeholder="Usuario" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)" /></p>
          
          <p><label for="contra" class="invisible">Contraseña:</label>
          <input type="password" id="contra" name="contra"  placeholder="contraseña" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)"> <span id = "message" style="color:red"> </span></p>
          
          <p><label for="repcontraseña" class="invisible">Repetir Contraseña:</label>
          <input type="password" id="repcontraseña" name="repcontraseña"  placeholder="repetir contraseña"> <span id = "messageconx" style="color:red"> </span> <span id = "messagecon" style="color:green"> </span></p>
          
          <p><label for="correo" class="invisible">Correo:</label>
          <input type="email" id="correo" name="correo"  placeholder="correo"></p>
          
          <p><label for="sexo" class="invisible">Sexo</label>
          <select id="sexo" name="sexo" >
            <option value="">Sexo</option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
            <option value="otro">Otro</option>
          </select></p>
  
          <p><label for="fechnac">Fecha de Nacimiento</label>
          <input type="date" id="fechnac" name="correo" value="2018-07-22" min="1920-01-01"  placeholder="fecha"></p>
  
          <p><label for="pais"  class="invisible">Pais de residencia:</label>
          <input type="text" id="pais" name="pais"  placeholder="pais de residencia"></p>
          <p><label for="ciudad"  class="invisible">Ciudad:</label>
          <input type="text" id="ciudad" name="ciudad"  placeholder="ciudad"></p>
  
          <p><label for="foto">Foto perfil</label>
          <input type="file" name="foto" id="foto" ></p>
          
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