<!DOCTYPE html>
<html lang="es">
<head>
    <title>Modificación de datos completado | myAlbum</title>

    <?php
    include("eleccionEstilo.php");
    ?>
</head>
<body>
<?php
include('header.php');
?>

<div id="background-resMisDatos" class="background_parallax">
    <section class="col-4 margin_auto padding20">

        <?php
        require("conexionBD.php");
        include('FiltrarDatos.php');
        if(isset($_FILES["input_foto"]["tmp_name"])){
            $tmp_name = $_FILES["input_foto"]["tmp_name"]; //ERROR FUTURO como no pilla el input no se sube bien a la bbdd
            $name_img = basename($_FILES["input_foto"]["name"]);
            $sql_count = "SELECT count(*) FROM usuarios";
                    $foto_count = $conexion->query($sql_count);
                    $foto_count_fetch = $foto_count->fetch_assoc();
                    $fichero_subido = $foto_count_fetch['count(*)']+1 . $usuario .$name_img;
                    move_uploaded_file($tmp_name, "img/$fichero_subido");
        }else{
            $fichero_subido = "anonymus.jpeg";
        }
            

        $old_pass = $_POST['passcorrecta'];

        $salted = "32298u2fjhkjsdvnfskhvsiudh2u3894234sdfjvds". $old_pass."2349F09WUFjjfjF0WJFGOJFOIW";

$hashed = hash('sha512', $salted);

$hasedcut = substr($hashed, 0, 15);

        $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);

        $sql = "SELECT contra FROM usuarios WHERE IdUsuario = $id;";
        $result_pass = $conexion->query($sql);
        $result_fetch_pass = $result_pass->fetch_assoc();
        $newcontra =substr($result_fetch_pass['contra'], 0, 15);
        //if($result_fetch_pass['contra'] == $hasedcut){
        if($newcontra == $hasedcut){
            if ($pass != $pass_repeat) {
                header('Location: UserRegister.php?error=pass_repeat');
                $datosCorrectos=false;
            }
            else if($datosCorrectos==true){
                $esc_usuario = mysqli_real_escape_string($conexion,$usuario);
                $esc_pass = mysqli_real_escape_string($conexion, $pass);
                $esc_email = mysqli_real_escape_string($conexion, $email);
                $esc_ciudad = mysqli_real_escape_string($conexion, $ciudad);
                $esc_pais = mysqli_real_escape_string($conexion, $pais);
                $esc_sexo = mysqli_real_escape_string($conexion, $sexo);
                $esc_estilo = mysqli_real_escape_string($conexion, $estilo);
                $esc_fechaN = mysqli_real_escape_string($conexion, $fechaN);
                $salted = "32298u2fjhkjsdvnfskhvsiudh2u3894234sdfjvds".$esc_pass."2349F09WUFjjfjF0WJFGOJFOIW";

                
                $sql = "UPDATE usuarios
                SET usuario = '$esc_usuario',
                    contra = '$hasedcut',
                    correo = '$esc_email',
                    sexo = '$esc_sexo',
                    fechnac = '$esc_fechaN',
                    Ciudad = '$esc_ciudad',
                    Pais = '$esc_pais',
                    Foto = '$fichero_subido',
                    Estilo = '$esc_estilo'
                WHERE IdUsuario = '$id'";

                if ($conexion->query($sql) === TRUE) {
                    echo "<section class='formyera'>";
                    echo "<h2 class=\"white text_shadow\">Modificación correcta</h2>";
                    echo "<h2 class=\"white text_shadow\">Tus datos son:</h2>";
                    echo "<p>Usuario: " . $usuario . "</p>";
                    echo "<p>Password: " . $pass . "</p>";
                    echo "<p>Email: " . $email . "</p>";
                    echo "<p>Ciudad: " . $ciudad . "</p>";
                    echo "<p>Pais: " . $pais . "</p>";
                    echo "<p>Sexo: " . $sexo . "</p>";
                    echo "<p>Estilo: " . $estilo . "</p>";
                    echo "<p>Fecha: " . $fechaN . "</p>";
                    echo "<img src='img/$fichero_subido' alt='icono' width='300' height='300'>";
                    echo "</section>";
                  //  echo "<p style='color:white;'>Foto: " . $name_img . "</p>";
                } else {
                    echo "<h2 class=\"white text_shadow\">La modificación ha sido incorrecta</h2>";
                }
            }
        }else{
            header('Location: UserRegister.php?error=error'.$newcontra.'+'.$hasedcut);
        }
        ?>
        <br><br>
    </section>
</div>

</body>
</html>