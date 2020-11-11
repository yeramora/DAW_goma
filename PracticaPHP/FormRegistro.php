<!DOCTYPE html>
<html lang="es">
  <head>
    <script src="Alexjs.js"></script>
    <script src="codigoyera.js"></script>
    <link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
    <link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen">
    <link rel="stylesheet" href="cssModoNoche.css" title="Modo noche" media="screen">
    <link rel="stylesheet" href="cssImprimir.css" media="print">
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen">
    <link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen"> 
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script> 
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
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
        
      <form name="registroform" action="/index_logged.php" class="formyera"  onsubmit="return validaformulario()">
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
          
          <button type="button" onclick="validaformulario()">Click Me!</button>
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