<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Formulario de Busqueda</title>
    <?php 
     include("eleccionEstilo.php");
  ?>
  </head>
  <body>
  <?php 
    include('header.php');
    require("conexionBD.php");
    setlocale(LC_TIME, "spanish");

$id_foto = mysqli_real_escape_string($conexion, $_GET['id']);
$sql = "SELECT * FROM FOTOS WHERE IdFoto = '$id_foto'";

$resultados = $conexion->query($sql);

while ($fila = $resultados->fetch_assoc()) {
    $titulo = $fila['Titulo'];

    $id_album = mysqli_real_escape_string($conexion, $fila['Album']);
    $album_row = $conexion->query("SELECT * FROM albumes WHERE IdAlbum = '$id_album'");
    $album_fetch = $album_row->fetch_assoc();

    $id_usuario = mysqli_real_escape_string($conexion, $album_fetch['Usuario']);
    $usuario_row = $conexion->query("SELECT * FROM usuarios WHERE IdUsuario = '$id_usuario'");
    $usuario_fetch = $usuario_row->fetch_assoc();

    $id_pais = mysqli_real_escape_string($conexion, $fila['Pais']);
    $pais_row = $conexion->query("SELECT nombre FROM paises WHERE id = '$id_pais'");
    $pais_fetch = $pais_row->fetch_assoc();

  
    $descrip = $fila['Descripcion'];
    $fichero = $fila['Fichero'];
    $fecha = $fila['Fecha'];
    list($anyo, $mes, $dia) = explode('-', $fecha);

    $fecha_remp = str_replace("/", "-", $fecha);
    $fecha_format = date("d-m-Y", strtotime($fecha_remp));
    $mes_format = strftime("%B", strtotime($fecha_format));
    $mes_format = strtoupper($mes_format);

    $fecha_correcta = substr($mes_format, 0, 3);
    $url = "img/" . $fichero;
}
  ?>
    <main>
     
      <article class="formyera" id="albumsend">
      <?php
        echo "<h1>$titulo</h1>";
        echo "<p><a href=FotoDetalle.php?id=$id_foto><img src='$url' alt='nombre' width=300 height=300> </a></p>";
        //echo "<p><time datetime=2020>$fecha_correcta</time></p>";
        echo "<p>Descripción: $descrip</p>";
        echo "<p>Pais: $pais_fetch[nombre]</p>";
        echo "<p>Fecha: $fecha</p>";
        echo "<p>Album: <a href='veralbumpublica.php?album=$album_fetch[IdAlbum]'> $album_fetch[Titulo]</a></p>";
        echo "<p>Usuario: <a href='perfilUsuario.php?id=$usuario_fetch[IdUsuario]'> $usuario_fetch[usuario]</a></p>";
      ?>
      </article>
    </main>
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>