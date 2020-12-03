<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Resultado busqueda</title>
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
    <section class="formyera">
        <h2 class="white text_shadow">Resultados de la búsqueda</h2>
        <br>
        <br>

        <?php
        if(isset($_GET['titulo'])){
          $titulo = $_GET['titulo'];
          echo "<p style='color:black;'>Nombre: '.$titulo.'</p> ";
        }else{

        }

        if(isset($_GET['fechprod'])){
          $fechproduccion = $_GET['fechprod'];
          echo "<p style='color:black;'>Desde: '.$fechproduccion.'</p>";
        }else{

        }
        if(isset($_GET['paises'])){
          $paisproduccion = $_GET['paises'];
          echo "<p style='color:black;'>País: '.$paisproduccion.'</p>";
        }else{

        }
        ?>
        
    </section>
        
      <h1 class="invisible">resultadobusqueda</h1>
        <?php
        $hasta =  date('Y-m-d H:i:s');
        require("conexionBD.php");
        $sql = "SELECT * FROM fotos WHERE Titulo LIKE '%$titulo%' AND Fecha BETWEEN '$fechproduccion' AND '$hasta' AND Pais = '$paisproduccion'";

          $resultados = $conexion->query($sql);

          if (mysqli_num_rows($resultados) == 0) {
              echo "<p class='white text_shadow'>No se encontró ninguna foto con ese filtro</p>";
          }

          while ($fila = $resultados->fetch_assoc()) {

              $id = $fila['IdFoto'];
              $fichero = $fila['Fichero'];
              $titulo = $fila['Titulo'];
              $descripcion = $fila['Descripcion'];
              $album = $fila['Album'];
              $alternativo = $fila['Alternativo'];
              $paisBuscar = mysqli_real_escape_string($conexion, $fila['Pais']);
              $sqlPais = "SELECT * FROM PAISES WHERE id = '$paisBuscar'";
              $pais = $conexion->query($sqlPais);
              $fecha = $fila['Fecha'];
              $paisNom = $pais->fetch_assoc();
              $paisNom2 = $paisNom['nombre'];
              $sqlusu = "SELECT * FROM albumes a WHERE a.IdAlbum = '$album'";
              $albumes = $conexion->query($sqlusu);
              $albuminfo = $albumes->fetch_assoc();
              $albumtitle = $albuminfo['Titulo'];
              $idusu = $albuminfo['Usuario'];
              

              echo "<article id='busquedarow'>";
              echo "<section>";
              echo "<a href='fotoDetalle.php?foto=$id'><img src='img/$fichero' alt='$alternativo' width='300' height='300'></a>";
              echo " <a href='perfilUsuario.php?id=$idusu'><i class='fas fa-user' aria-hidden='true'>Usuario</i></a>";
              echo " <a href='veralbumpublica.php?album=$album'><i class=''fas fa-user'' aria-hidden='true'>Album $albumtitle</i></a>";
              echo "</section>";
              echo "<section>";
              echo "<h1>$titulo</h1>";
              echo "<p><time datetime='2020'>$fecha</time></p>";
              echo "<p>$paisNom2</p>";
              echo "<p>$descripcion</p>";
              echo "</section>";
              echo "</article>";
          }
        ?>
        <h1 class="invisible">resultadobusqueda</h1>
     <!--   <section>
          <a href="FotoDetalle.php?id=1"><img src="img.png" alt="icono" width="300" height="200"></a>
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
          <a href="FotoDetalle.php?id=2"><img src="img.png" alt="icono" width="300" height="200"></a>
          <a href="user.php"><i class="fas fa-user" aria-hidden="true">Usuario</i></a>
            <a href="album.php"><i class="fas fa-images" aria-hidden="true">NombreAlbum</i></a>
        </section>
        <section>
          <h1>Titulo foto</h1>
          <p><time datetime="2020">28/09/2020</time></p>
          <p>Pais: España</p>
        </section> --->
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
