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

        $old_pass = $_POST['passcorrecta'];

        $salted = "32298u2fjhkjsdvnfskhvsiudh2u3894234sdfjvds". $old_pass."2349F09WUFjjfjF0WJFGOJFOIW";

$hashed = hash('sha512', $salted);

$hasedcut = substr($hashed, 0, 14);

        $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);

        $sql = "SELECT contra FROM usuarios WHERE IdUsuario = $id;";
        $result_pass = $conexion->query($sql);
        $result_fetch_pass = $result_pass->fetch_assoc();

        if($result_fetch_pass['contra'] == $hasedcut){
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

                $sql = "UPDATE usuarios
                SET usuario = '$esc_usuario',
                    contra = '$esc_pass',
                    correo = '$esc_email',
                    sexo = '$esc_sexo',
                    fechnac = '$esc_fechaN',
                    Ciudad = '$esc_ciudad',
                    Pais = '$esc_pais',
                    Foto = '$fichero_subido',
                    Estilo = '$esc_estilo'
                WHERE IdUsuario = '$id'";

                if ($conexion->query($sql) === TRUE) {
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
                  //  echo "<p style='color:white;'>Foto: " . $name_img . "</p>";
                } else {
                    echo "<h2 class=\"white text_shadow\">La modificación ha sido incorrecta</h2>";
                }
            }
        }else{
            header('Location: UserRegister.php?error=error');
        }
        ?>
        <br><br>
    </section>
</div>

</body>
</html>