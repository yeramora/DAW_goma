<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include("eleccionEstilo.php");
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
            $album = $_POST['album'];
            $nombre = $_POST['named'];
            $titulo = $_POST['tituloa'];
            $email = $_POST['email'];
            $extra = $_POST['texta'];
            $colortot = $_POST['colora'];
            $color = $_POST['coloralbum'];
            $copias = $_POST['numa'];
            $resolucion = $_POST['reso'];
            $calle=$_POST['calle'];
            $numero=$_POST['numberdirect'];
            $loc=$_POST['localidad'];
            $fecha=$_POST['fechrec'];
            $coloral=$_POST['coloralbum'];            


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
            $sql = "INSERT INTO solicitudes(IdSolicitud,Album,Nombre,Titulo,Descripcion,Email,Direccion,Color,Copias,Resolucion,Fecha,IColor,FRegistro,Coste) VALUES('NULL','$album','$nombre','$titulo','$extra','$email','$calle+$numero+$loc','$color','$copias','$resolucion','$fecha','$coloral','null','$precio_total')";
            if($conexion->query($sql)){
            
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
          }
        ?>
          
          <p class="enviar"><a href="UserRegister.php">Aceptar</a> </p>
        
        </article>

    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
