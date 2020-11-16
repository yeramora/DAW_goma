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
?>
    <title>Memories LOGGED</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
      <article class="formyera" id="albumsend">
        <h1>Informacion Album Solicitado</h1>
          <img src="descarga.png" alt="fotoalbum">

          <?php
            $nombre = $_POST['named'];
            $titulo = $_POST['tituloa'];
            $extra = $_POST['texta'];
            $colortot = $_POST['colora'];
            $color = $_POST['coloralbum'];
            $copias = $_POST['numa'];
            $resolucion = $_POST['reso'];
            $calle=$_POST['calle'];
            $numero=$_POST['numberdirect'];
            $loc=$_POST['localidad'];


            $numero_paginas = 20;
            $numero_fotos = 10;


            $precio_fotos = 0;
            $precio_paginas = 0;
            $precio_total = 0;

            if($color == 'blackwhite'){
                $precio_fotos = 0;
            }
            else{
                $precio_fotos = $numero_fotos * 0.05;
            }

            if($resolucion>300){
                $precio_fotos = $precio_fotos + ($numero_fotos * 0.02);
            }

            if($numero_paginas<5){
                $precio_paginas = $numero_paginas * 0.10;
            }
            if(5<$numero_paginas && $numero_paginas>10){
                $precio_paginas = $numero_paginas * 0.08;
            }
            if($numero_paginas>10){
                $precio_paginas = $numero_paginas * 0.07;
            }

            $precio_total = $precio_fotos + $precio_paginas;
            $precio_total = $precio_total * $copias;

            echo "<p>Nombre: ".$nombre."</p>";
            echo "<p>Título: ".$titulo."</p>";
            echo "<p>Texto adicional: ".$extra."</p>";
            echo "<p>Número de copias: ".$copias."</p>";
            echo "<p>Precio total: ".$precio_total."</p>";

            if($color == 'blackwhite'){
                echo "<p>Color: Blanco y negro</p>";
            }else{
                echo "<p>Color: En color</p>";
                echo "<p  style='background-color:".$colortot.";'>Color elegido:".$colortot."</p>";
            }
            echo "<p> Será enviado a ".$loc." Calle ".$calle." numero ".$numero."</p>";
        ?>
          
          <p class="enviar"><button>Aceptar</button> <a href="index_logged.php"></a> </p>
        
        </article>

    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
