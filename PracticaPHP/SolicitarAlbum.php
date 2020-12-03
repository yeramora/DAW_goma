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
    <title>Solicitar Album - Memories</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main>
    <?php
    $tablaprecios = array();
    $deductor1=0;
    $deductor2=0;
    for($i=1;$i<16;$i++){
      if($i>4){
        $deductor1=($i-4)*0.02;
        if($i>12){
          $deductor2=($i-11)*0.01;
        }
      }
      $p1=0.10*$i-$deductor1-$deductor2;
      $p2=0.16*$i-$deductor1-$deductor2;
      $p3=0.25*$i-$deductor1-$deductor2;
      $p4=0.31*$i-$deductor1-$deductor2;
      array_push($tablaprecios,array("Numero de paginas"=>$i, "Numero de fotos"=>$i*3 , "150-300DPI"=>$p1, "450-900DPI"=>$p2," 150-300DPI"=>$p3," 450-900DPI"=>$p4));
    }
?>

      <article>
        <h1 class="invisible">Solicitar Album</h1>
      <form action="SolicitarAlbumsend.php" class="formyera" method = "post">
        <h1>Solicitar Album</h1>
          <p>Rellene las opciones de este formulario para continuar con su compra</p>
          <table>
            <caption><strong>Informacion de Tarifas de precio</strong></caption>
            <tr>
              <td><strong>Paginas</strong></td>
              <td><strong>&#8364;</strong></td>
              <td><strong>Resolucion</strong></td>
              <td><strong>&#8364;</strong></td>
              <td><strong>Portada</strong></td>
              <td><strong>&#8364;</strong></td>
            </tr>
            
            <tr>
              <td>61</td>
              <td>Gratis</td>
              <td>150 DPI</td>
              <td>10</td>
              <td>B/N</td>
              <td>5</td>
            </tr>
            
            <tr>
              <td>Adicional</td>
              <td>0,49</td>
              <td>300 DPI</td>
              <td>15</td>
              <td>Color</td>
              <td>10</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>450 DPI</td>
              <td>20</td>
              <td> </td>
              <td> </td>
            </tr>
            
            <tr>
              <td> </td>
              <td> </td>
              <td>600 DPI</td>
              <td>25</td>
              <td> </td>
              <td> </td>
            </tr>
            <tr>
              <td> </td>
              <td> </td>
              <td>750 DPI</td>
              <td>30</td>
              <td> </td>
              <td> </td>
            </tr>
            <tr>
              <td> </td>
              <td> </td>
              <td>900 DPI</td>
              <td>35</td>
              <td> </td>
              <td> </td>
            </tr>
          </table>
          <p><label for="named" class="invisible">Nombre y Apellidos:</label>
          <input type="text" id="named" name="named" maxlength="200" required placeholder="Nombre y Apellidos*"></p>
          
          <p><label for="tituloa" class="invisible">Titulo del album*:</label>

          <input type="text" id="tituloa" name="tituloa" required placeholder="Titulo Album*"></p>
  
          <p><label for="texta" class="invisible">Texto Adicional:</label>
          <input type="text" id="texta" name="texta" placeholder="Texto Adicional*"></p>

          <p><label for="email" class="invisible">Correo Electronico*:</label>
          <input type="text" id="email" name="email" required placeholder="Email*"></p>
          <section>
            <h3>Direccion de Entrega:</h3>
          <label for="calle" class="invisible">Calle*:</label>
          <input type="text" id="calle" name="calle" required placeholder="Calle*">
          <label for="numberdirect" class="invisible">Numero*:</label>
          <input type="number" id="numberdirect" name="numberdirect" required placeholder="Numero*">
          <label for="pisodirect" class="invisible">Piso*:</label>
          <input type="number" id="pisodirect" name="pisodirect" required placeholder="Piso*">
          <label for="puertadirect" class="invisible">Puerta*:</label>
          <input type="text" id="puertadirect" name="puertadirect" required placeholder="Puerta*">
          <label for="postalcode" class="invisible">Codigo Postal*:</label>
          <label for="paisd" class="invisible">Pais*:</label>
          <input type="text" id="paisd" name="paisd" required placeholder="Pais*">
          <input type="number" id="postalcode" name="postalcode" required placeholder="Codigo Postal*">
          <label for="localidad" class="invisible">Localidad*:</label>
          <input type="text" id="localidad" name="localidad" required placeholder="Localidad*">
          <label for="provincia" class="invisible">Provincia*:</label>
          <input type="text" id="provincia" name="provincia" required placeholder="Provincia*">
        </section>
          <p><label for="telf" class="invisible">Telefono*:</label>
          <input type="tel" id="telf" name="telf" placeholder="Telefono"></p>
          
          <p><label for="colora">Color de portada*:</label>
          <input type="color" id="colora" name="colora"></p>

          <p><label for="numa">Numero de copias*:</label>
          <input type="number" id="numa" name="numa" value="1" min="1" required ></p>

          <p><label for="reso">Resolucion Fotos:*</label>
          <input type="number" id="reso" name="reso" value="150" min="150" max="900" step="150" required></p>

          <p><label for="album">Solicitar album*:</label>
            <select id="album" name="album" required>
            <?php
                        require("rellenarAlbumes.php");

                        ?>
            </select>
          </p>

          <p><label for="fechrec">Fecha de entrega:</label>
          <input type="date" id="fechrec" name="fechrec"></p>

          <p><label for="coloralbum">Color o B/N*</label>
            <select id="coloralbum" name="coloralbum" required>
              <option value="">--</option>
              <option value="blackwhite">B/N</option>
              <option value="colorful">Color</option>
            </select>
          </p>
          
          <p class="enviar"><input type="submit" id="enviar" name="enviar">
            <input type="reset" id="borrar" name="Borrar"></p>
          <table id="tabla"></table>
          <?php if (count($tablaprecios) > 0): ?>
            <table>
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th>blanco y negro</th>
                  <th></th>
                  <th>Color</th>
                </tr>
                <tr>
                  <th><?php echo implode('</th><th id="tabphp">', array_keys(current($tablaprecios))); ?></th>
               </tr>
             </thead>
             <tbody>
                <?php foreach ($tablaprecios as $row): array_map('htmlentities', $row); ?>
                  <tr>
                    <td><?php echo implode('</td><td>', $row); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            <?php endif; ?>

      </form> 
    </article>
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
