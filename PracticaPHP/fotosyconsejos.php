<?php
        require("conexionBD.php");

        //La parte de lectura del TXT
        $lineas = file('fotos_seleccionadas.txt');

        $array_lineas = array();
        foreach ($lineas as $num_linea => $linea) {
            array_push($array_lineas, $linea);
        }

        $indices = range(0, count($array_lineas)-1);
        shuffle($indices);
        $contador=0;
        foreach ($indices as $indice) {

          /*
8_XxJuananxX_comentario8
9_Lupita_comentario9
10_RamonYCajal_comentario10

pa probar
          */
            if( $contador<1){
              $claves = preg_split("/#/", "$array_lineas[$indice]");

              $sql = "SELECT * FROM FOTOS WHERE IdFoto='$claves[0]'";
              $resultados = $conexion->query($sql);
  
              if ($conexion->errno) {
                  echo "Problemas al establecer conexion";
              }
              else{
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

                echo "<article id='busquedarow'>
                <section>
                <a href='FotoDetalle.php?id=$id'><img src='img/$fichero' height='150' width='150'></a>
                <p>$paisNom2, $fecha</p>
                </section>
                <section>
                <h2>$titulo</h2>
                <p>Seleccionado por $claves[1]</p>
                <p>Comentario: $claves[2]</p>
                </section>
                </article>";
                $contador++;
              }
            }
            

        }

        //FIN LECTURA TXT

        //INICIO LECTURA JSON
        $json = file_get_contents('consejos.json');
        $json = json_decode($json,true);
        $total =  count($json["consejos"]) - 1;
        $array = rand(0, $total);
        $cat = $json["consejos"][$array]["Categoria"];
        $dif = $json["consejos"][$array]["Dificultad"];
        $con = $json["consejos"][$array]["Consejo"];
        echo "<article id='busquedarow'><section>";
        echo "<h1>Superconsejito del dia</h1>";
        echo "<h3>Categoria:</h3> <p>$cat</p>";
        echo "<h3>Dificultad:</h3> <p>$dif</p>";
        echo "<h3>El truco:</h3> <p>$con</p>";
        echo "</section></article>";

        /*  
        pa probar modificacion

        {
    "Categoria":"Ajustes 123",
    "Dificultad":"Difici2312313l",
    "Consejo":"Consejo numero 4 todo bien bonito perfecto"
  }
        
        
        
        */
        ?>