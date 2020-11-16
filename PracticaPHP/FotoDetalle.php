<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Busqueda</title>
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
?>
  </head>
  <body>
  <?php 
    include('header.php');
  ?>
    <main>
     
      <article class="formyera" id="albumsend">
      <?php 
        $id = $_GET['id'];
        if($id==1){
          $infofoto = array("foto"=>"descarga.png","titulo"=>"title2 ","nombre"=>"nombre2", "fecha"=>"01/11/2010" , "pais"=>"india2", "album"=>"viajes dorle","usu"=>"dorleta");
        }
        else{
          $infofoto = array("foto"=>"img.png","titulo"=>"title ","nombre"=>"nombre", "fecha"=>"01/11/2010" , "pais"=>"india", "album"=>"viajes dorle","usu"=>"dorleta");
        }
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