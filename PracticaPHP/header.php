<?php

echo
"<header>
<a href='index_logged.php'><img src='logo.png' alt='icono' width='100' height='100'></a> 
<p>Memories</p>
<aside>
  <a href='FormBusqueda.php'><i class='fa fa-search' aria-hidden='true'>Buscar</i></a>        
  <a href='UserRegister.php'><i class='fas fa-sign-out-alt' aria-hidden='true'>{$_SESSION['sesion']['usuario']}</i></a>
  <a class='float_right margin_top_icon margin_right_icon' href='cerrarSesion.php'><i class='fa fa-user-slash'></i>Cerrar Sesion</a>
</aside>
</header>"; 

?>
