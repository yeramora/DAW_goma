<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Memories LOGGED</title>
    <?php 
    include("eleccionEstilo.php");
?>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
    <?php 
    if (isset($_COOKIE['recuerdame'])) {
      echo "<div id='capafondo'>";
      echo "<article>";
      echo "<h2>Hola : ".$_SESSION['sesion']['usuario']."</h2>";
      echo "<p>Ultima conexion:";
      if(isset($_COOKIE['tiempo'])){
        $cookie = json_decode($_COOKIE['tiempo'],true);
        echo $cookie['mday'] . " de " . $cookie['month'] . " de " . $cookie['year'] . " a las " . $cookie['hours'] .":". $cookie['minutes'];
        $date = json_encode(getdate());
        setcookie('tiempo',$date,time() + 86400 * 90);

    }else{
        echo "Nunca"; //cookies individuales por ordenador o por usuario
        $date = json_encode(getdate());
        setcookie('tiempo',$date,time() + 86400 * 90);

    }
    echo "</p>";
    echo "<button onclick='cerrarmodal();'> Aceptar </button>";
    echo "</article>";
    echo "</div>";
    }
    ?>
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
        <section>
    <br>
    <h2 class="white">Últimas fotos</h2>
    <div class="container col-11 margin_auto">
        <?php
        require("conexionBD.php");
        $lineas = file('fotos_seleccionadas.txt');

        $array_lineas = array();
        foreach ($lineas as $num_linea => $linea) {
            array_push($array_lineas, $linea);
        }

        $indices = range(0, count($array_lineas));
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
          </section>
          <article id="busquedalogin">
            <h1>Busqueda</h1>
            <form action="ResBusqueda.php" method = "get" class="formyera">
            <p><label for="titulo" class="invisible">Titulo</label >
            <input type="text" id="titulo" name="titulo" placeholder="titulo"></p>
          </form>
          </article>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
