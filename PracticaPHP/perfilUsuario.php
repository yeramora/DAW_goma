    <!DOCTYPE html>
<html lang="es">
  <head>
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
    $id_user = $_GET['id'];
    
?>
    <title>Memories - Perfil Usuario</title>
  </head>
  <body>
  <?php
    require("conexionBD.php");

    $id_foto = mysqli_real_escape_string($conexion, $_GET['id']);
    $sql = "SELECT * FROM usuarios WHERE IdUsuario = '$id_foto'";

    $resultados = $conexion->query($sql);

    while ($fila = $resultados->fetch_assoc()) {
        $nombre = $fila['usuario'];
        $imagen = $fila['Foto'];
        $fechaincorporacion = $fila['FRegistro'];


    }

    
    /*                    $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['$id_user']);
                        $sql = "SELECT * FROM USUARIOS WHERE IdUsuario='$id'";
                        $resultado = $conexion->query($sql);
                        $resultado_fetch = $resultado->fetch_assoc();

                        $nombre = $resultado_fetch['usuario'];
                        $email = $resultado_fetch['correo'];
                        $sexo = $resultado_fetch['sexo'];
                        $fecha = $resultado_fetch['fechnac'];
                        $estilo = $resultado_fetch['Estilo'];
                        $ciudad = $resultado_fetch['Ciudad'];
                        $pais = $resultado_fetch['Pais']; */
                        ?>
  <?php 
    include('header.php');
    ?>
    <main id="mainuser">
      <article id="infogeneral">
      <article id="infouser">
      <?php
      $newdate = date("d-m-Y", strtotime($fechaincorporacion));
                echo "<h2>Perfil de ' $nombre'</h2>
                  <img src='$imagen' alt='icono' width='300' height='300'>
                  
                  <p><b>Usuario desde: </b>'$newdate'</p>

                  <h3>MIS ALBUMES<h3>
                  
                  ";
                
            ?>
      <section>
    <?php
    require("conexionBD.php");
    $id_user = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
    $sql = "SELECT * FROM ALBUMES WHERE Usuario='$id_user'";
    $rest_albumes = $conexion->query($sql);
    $flag = 1;
    $par = 1;
    while ($fila = $rest_albumes->fetch_assoc()) {
        $id_album = mysqli_real_escape_string($conexion, $fila['IdAlbum']);
        $titulo_album = $fila['Titulo'];
        if ($par % 2 != 0) {
            echo "<h2>
                <a  class='extra' href='veralbum.php?album=$id_album'>$titulo_album</a></h2>";
        }
        /*   
        $sql = "SELECT Fichero FROM FOTOS WHERE Album='$id_album' limit 3";
        $rest_fotos_albumes = $conexion->query($sql);
        while ($row = mysqli_fetch_assoc($rest_fotos_albumes)) {
            $id_fichero = $row['Fichero'];
            $type_figure = "figure" . $flag;
            echo "<figure class=\"figure $type_figure\">
                <img class=\"figure-img\" src=\"img/$id_fichero\" alt=\"a kitten\"></figure>";
            if ($flag == 6) {
                $flag = 0;
            }
            $flag++;
        } */
        if ($par % 2 == 0) {
            echo "<h2>
            <a href='veralbum.php?album=$id_album'>$titulo_album</a></h2>";
        }
        $par++; 
    }
    ?>  
    </section>  
          <p class="white text_shadow" style="font-size: .7em;"> Última conexión: 
                <?php 

                    if (isset($_SESSION['sesion'])) {

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
                        
                        
                    }
                ?>
            </p>
      </article>
        

                
        </article> 
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
