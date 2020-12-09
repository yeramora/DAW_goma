<!DOCTYPE html>
<html lang="es">
  <head>
  <?php
    include("eleccionEstilo.php");
    ?>
    <title>Memories - LOGGED</title>
  </head>
  <body>
  <?php 
    include('header.php');
    ?>
    <main id="mainuser">
      <article>
        <h2>Elija su estilo</h2>
        <form name="registroform" action="respConfigurarestilos.php" method= "post" class="formyera">
            <p><label class="label_blanco text_shadow">Estilo</label>
                <select name="Estilo">
                    <?php
                    require("rellenarEstilos.php");

                    ?>
                </select>
            </p>

            <p class="enviar"><input type="submit" id="enviar" name="enviar">
        </form>

      </article>
     
    </main>
    <footer>
      <h3><a href="acerca.php">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
