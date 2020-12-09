<?php
if (isset($_COOKIE['sesion'])) {
    header('Location:' . 'index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Añadir foto a álbum - Memories</title>
    <?php
    include("eleccionEstilo.php");
    ?>
</head>
<body>
<?php
include('header.php');
?>
<main>
    <section>
        <h2>Añadir foto a álbum</h2>
        <form action="resSubidaFoto.php" method="post" class="formyera">
            <p><label class="invisible" for="titulo">Título de la foto</label>
            <input type="text" name="titulo" placeholder="Título de la foto"></p>
            
            <p><label class="invisible" for="descripcion">Descripción</label>
            <textarea rows="4" cols="80" name="descripcion" placeholder="Descripción"></textarea></p>
            
            <p><label>
                        <label class="label_blanco text_shadow" for="fecha">Fecha</label>
                        <input type="date" name="fecha">
                </p>
                <p><label class="label_blanco text_shadow">País</label>
                    <p class="select">
                        <select name="paises">
                            <?php
                                require("rellenarPaises.php");
                            ?>
                        </select></p>
            
            <p><label class="invisible  " for="textoAlternativo">Texto alternativo</label>
            <input type="text" name="textoAlternativo" placeholder="textoAlternativo"></p>
            
            
            <p><label class="label_blanco text_shadow" for="album">Album</label>
                <select name="album">
                    <?php
                    require("rellenarAlbumes.php");
                    ?>
                </select></p>
            
            <label id="add-computer-button" for="fileupload" class="upload_file_btn">Sube tu foto
            </label>
            <input id="fileupload" required type="file" multiple="multiple" name="input_foto" accept="image/jpeg">
            <button type="submit" style="cursor:pointer;">Añadir foto</button>
        </form>
    </section>
</main>
</body>
</html>