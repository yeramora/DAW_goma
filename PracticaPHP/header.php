<?php
 require("conexionBD.php");
 $id = mysqli_real_escape_string($conexion, $_SESSION['sesion']['IdUsuario']);
 $sql = "SELECT * FROM USUARIOS WHERE IdUsuario='$id'";
 $resultado = $conexion->query($sql);
 $resultado_fetch = $resultado->fetch_assoc();

 $nombre = $resultado_fetch['usuario'];
echo
"<header>
<a href='index_logged.php'><img src='logo.png' alt='icono' width='100' height='100'></a> 
<p>Memories</p>
<aside>
  <a href='FormBusqueda.php'><i class='fa fa-search' aria-hidden='true'>Buscar</i></a>        
  <a href='UserRegister.php'><i class='fas fa-sign-out-alt' aria-hidden='true'>$nombre</i></a>
  <a class='float_right margin_top_icon margin_right_icon' href='cerrarSesion.php'><i class='fa fa-user-slash'></i>Cerrar Sesion</a>
</aside>
</header>"; 

?>
