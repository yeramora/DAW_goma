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
    $album_row = $conexion->query("SELECT Titulo,Usuario FROM albumes WHERE IdAlbum = '$id_album'");
    $album_fetch = $album_row->fetch_assoc();

    $id_usuario = mysqli_real_escape_string($conexion, $album_fetch['Usuario']);
    $usuario_row = $conexion->query("SELECT NomUsuario FROM usuarios WHERE IdUsuario = '$id_usuario'");
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
        echo "<p><a href=FotoDetalle.php><img src='$url' alt='nombre' width=300 height=300> </a></p>";
        echo "<p><time datetime=2020>$fecha_correcta</time></p>";
        echo "<p>Nombre: $descrip</p>";
        echo "<p>Pais: $pais_fetch[nombre]</p>";
        echo "<p>Album: $album_fetch[Titulo]</p>";
        echo "<p>Usuario: $usuario_fetch[NomUsuario]</p>";
      ?>
      </article>
    </main>
    <footer>
        <h3><a href="acerca.php">Acerca</a></h3>
        <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>