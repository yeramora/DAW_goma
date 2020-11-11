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
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen"> 
    <link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen"> 
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script>
    <title>Memories</title>
  </head>
  <body>
  <?php 
    include('headersinlogear.php');
    ?>
      <main>
        <article id="artfotos">
          <h1>Las ultimas fotos</h1>
          <section>
            <h2 class="invisible">section</h2>
          <a href="MensajeModal.html"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.html"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.html"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.html"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>
          <a href="MensajeModal.html"><img class="diagonal" src="img.png" alt="icono" width="400" height="600"></a>   
          </section>
        </article>
        <article id="busquedalogin">
          <h1>Busqueda</h1>
          <a href="ResBusqueda.html"><i class="fa fa-search" aria-hidden="true"></i></a>
          <label for="busqueda" class="invisible">Busqueda</label>
          <input type="text" name="busqueda" id="busqueda" required>
        </article>
      </main>
    <footer>
      <h3><a href="acerca.html">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
