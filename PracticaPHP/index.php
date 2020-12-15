<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories - Index</title>
    <?php 
      session_start();
    if (isset($_COOKIE['recuerdame'])) {
      $data = json_decode($_COOKIE['recuerdame'], true);
      $_SESSION['sesion'] = $data;
    }
    if (isset($_SESSION['sesion'])) {
      header('Location:'.'index_logged.php');
  } else {
    include('meta.php');
  }

?>
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
            <?php
        require("conexionBD.php");

        $sql = "SELECT * FROM FOTOS ORDER BY FRegistro DESC limit 5";
        $resultados = $conexion->query($sql);

        if ($conexion->errno) {
            echo "Problemas al establecer conexion";
        }

        while ($fila = $resultados->fetch_assoc()) {
            $id = $fila['IdFoto'];
            $fichero = $fila['Fichero'];
            $alter = $fila['Alternativo'];
            echo " <a href='FotoDetalle.php?id=$id'><img class='diagonal' src='img/$fichero' alt='$alter' width='400' height='600'></a>";
        }
        ?>  
          </section>
        </article>
        <section>
    <br>
    <h2 class="white">Fotos Seleccionadas</h2>
    <div class="container col-11 margin_auto">
        <?php
        require("conexionBD.php");
        $lineas = file('fotos_seleccionadas.txt');
       
        $array_lineas = array();
        foreach ($lineas as $num_linea => $linea) {
            array_push($array_lineas, $linea);
        }
        $indices = range(0, 5);
        shuffle($indices);

        foreach ($indices as $indice) {

            $claves = preg_split("/_/", "$array_lineas[$indice]");

            $sql = "SELECT * FROM FOTOS WHERE IdFoto='$claves[0]'";
            $resultados = $conexion->query($sql);

            if ($conexion->errno) {
                echo "Problemas al establecer conexion";
            }

            $fila = $resultados->fetch_assoc();
                $id = $fila['IdFoto'];
                $fichero = $fila['Fichero'];
                $titulo = $fila['Titulo'];
                $descripcion = $fila['Descripcion'];
                $paisBuscar = mysqli_real_escape_string($conexion, $fila['Pais']);
                $sqlPais = "SELECT * FROM PAISES WHERE id = '$paisBuscar'";
                $pais = $conexion->query($sqlPais);
                $fecha = $fila['FRegistro'];
                $paisNom = $pais->fetch_assoc();
                $paisNom2 = $paisNom['nombre'];

                echo "<a class='link_photo' href='FotoDetalle.php?id=$id'><div class='box_photo'><div class=\"foto\" style=\"background-image: url('img/$fichero');\"><div class=\"text_photo\"><h2>$titulo</h2><div class='info_foto'><p>Seleccionado por $claves[1]</p><p style='margin-bottom: 0;margin-top: -10px'>Comentario: $claves[2]</p></div><br><div class='info_foto'>$paisNom2, $fecha</div></div></div></div></a>";

        }
        ?>

    </div>
</section>
        <article id="busquedalogin">
          <h1>Busqueda</h1>
          <a href="ResBusqueda.php"><i class="fa fa-search" aria-hidden="true"></i></a>
          <label for="busqueda" class="invisible">Busqueda</label>
          <input type="text" name="busqueda" id="busqueda" required>
        </article>
      </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
      <p>Copyright &copy; DAW <time datetime="2020">2020-2021</time></p>
    </footer>
  </body>
</html>
