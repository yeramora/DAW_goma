<!DOCTYPE html>
<html lang="es">
  <head>
<link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen"> 
<link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
<link rel="stylesheet" href="LetrasGrandes.css" title="GrandeLetra" media="screen">
<link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
<link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen">
<link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen"> 
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Formulario de Busqueda</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <article class="formyera" id="albumsend">
        <h1>Titulo Foto</h1>
        <p> <a href="FotoDetalle.php"><img src="img.png" alt="icono" width="300" height="300"></a></p>
        <p><time datetime="2020">28/09/2020</time></p>
        <p>Pais: España</p>
        <p>Album: Fotos Favoritas</p>
        <p>Usuario: user1</p>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium, similique! Praesentium incidunt earum sit commodi soluta? Temporibus dolorem corrupti voluptas sunt illum eligendi. Nesciunt eaque, dolorem sapiente unde culpa totam?
        </p>
      </article>
    </main>
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>