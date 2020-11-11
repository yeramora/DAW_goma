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
    <title>Memories LOGGED</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main id="mainuser">
      <article id="infogeneral">
        <h1 class="invisible">Infogeneral</h1>
          <img src="img.png" alt="icono" width="300" height="300">
          <section>
            <h1>Nombreusuario</h1>
          <p>Info usuario lorem ipsum</p>
          <p>Info usuario lorem ipsum</p>
          <p>Info usuario lorem ipsum</p>
          </section>
      </article>
      <article id="infouser">
        <h1 class="invisible">Mi cuenta</h1>
        <button value="borrar cuenta">Mis albums</button>
        <button value="borrar cuenta">Mi perfil</button>
          <p>esta pagina solo muestra o los albums o el perfil,cambiando entre ambos al pulsarlos</p>
          <a href="crearalbum.php">Crear album</a>
          <a href="SolicitarAlbum.php">Solicitar&nbsp;album</a> 
          <fieldset class="row">
            <legend>Al pulsar en mis albums</legend>
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
            <img src="img.png" alt="icono" width="300" height="300">
          </fieldset>
          <fieldset>
            <legend>Al pulsar en mi perfil</legend>
            <form action="RespRegistroNuevoUser.php" method = "post" class="formyera">
              <h1>Mis datos</h1>
                <p><label for="usuario" class="invisible">Usuario:</label >
                <input type="text" id="usuario" name="usuario" required placeholder="Usuario"></p>
                
                <p><label for="contra" class="invisible">Contraseña:</label>
                <input type="password" id="contra" name="contra" required placeholder="contraseña"></p>
                
                <p><label for="repcontraseña" class="invisible">Repetir Contraseña:</label>
                <input type="text" id="repcontraseña" name="repcontraseña" required placeholder="repetir contraseña"></p>
                
                <p><label for="correo" class="invisible">Correo:</label>
                <input type="text" id="correo" name="correo" required placeholder="correo"></p>
                
                <p><label for="sexo" class="invisible">Sexo</label>
                <select id="sexo" name="sexo" required>
                  <option value="">Sexo</option>
                  <option value="hombre">Hombre</option>
                  <option value="mujer">Mujer</option>
                  <option value="otro">Otro</option>
                </select></p>
        
                <p><label for="fechnac">Fecha de Nacimiento</label>
                <input type="date" id="fechnac" name="correo" value="2018-07-22" min="1920-01-01" required placeholder="fecha"></p>
        
                <p><label for="pais"  class="invisible">Pais de residencia:</label>
                <input type="text" id="pais" name="pais" required placeholder="pais de residencia"></p>
                <p><label for="ciudad"  class="invisible">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required placeholder="ciudad"></p>
        
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
