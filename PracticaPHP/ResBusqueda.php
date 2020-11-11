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
    <title>Resultado busqueda</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <article id="busquedarow">
        <h1 class="invisible">resultadobusqueda</h1>
        <section>
          <a href="FotoDetalle.php"><img src="img.png" alt="icono" width="300" height="200"></a>
          <a href="user.php"><i class="fas fa-user" aria-hidden="true">Usuario</i></a>
            <a href="album.php"><i class="fas fa-images" aria-hidden="true">NombreAlbum</i></a>
        </section>
        <section>
          <h1>Titulo foto</h1>
          <p><time datetime="2020">28/09/2020</time></p>
          <p>Pais: España</p>
        </section>
        
      </article>
      <article id="busquedarow">
        <h1 class="invisible">resultadobusqueda</h1>
        <section>
          <a href="FotoDetalle.php"><img src="img.png" alt="icono" width="300" height="200"></a>
          <a href="user.php"><i class="fas fa-user" aria-hidden="true">Usuario</i></a>
            <a href="album.php"><i class="fas fa-images" aria-hidden="true">NombreAlbum</i></a>
        </section>
        <section>
          <h1>Titulo foto</h1>
          <p><time datetime="2020">28/09/2020</time></p>
          <p>Pais: España</p>
        </section>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
