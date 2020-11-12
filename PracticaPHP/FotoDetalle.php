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
      <?php 
if(isset($_GET['foto']) && $_GET['foto']==1){
            
  echo '<div class="split-foto dcha-foto">gitananana</div>';
}else if(isset($_GET['foto']) && $_GET['foto']==2){

  echo '<div class="split-foto dcha-foto2">aaaaaaaaa</div>';
  
}
        $infofoto = array("foto"=>"img.png","titulo"=>"title ","nombre"=>"nombre", "fecha"=>"01/11/2010" , "pais"=>"india", "album"=>"viajes dorle","usu"=>"dorleta"," 450-900DPI"=>"jiji");
        echo "<h1>".$infofoto['titulo']."</h1>";
        echo "<p><a href=FotoDetalle.php><img src='".$infofoto['foto']."' alt='nombre' width=300 height=300> </a></p>";
        echo "<p><time datetime=2020>".$infofoto['fecha']."</time></p>";
        echo "<p>Nombre: ".$infofoto['nombre']."</p>";
        echo "<p>Pais: ".$infofoto['pais']."</p>";
        echo "<p>Album: ".$infofoto['album']."</p>";
        echo "<p>Usuario: ".$infofoto['usu']."</p>";
      ?>
      </article>
    </main>
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>