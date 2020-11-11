<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cssYera.css" title="Estilo básico" media="screen">  
    <link rel="stylesheet" href="cssAlex.css" title="Estilo básico" media="screen">
    <link rel="stylesheet" href="cssModoNoche.css" title="Modo noche" media="screen">
    <link rel="stylesheet" href="cssImprimir.css" media="print">
    <link rel="stylesheet" href="LetrasGrandes.css" title="LetrasGrandes" media="screen"> 
    <link rel="stylesheet" href="Coontraste.css" title="Contraste" media="screen">
    <link rel="stylesheet" href="ContrasteLetras.css" title="ContrasteLetras" media="screen">       
    <script src="https://kit.fontawesome.com/6b4ca2c1fd.js" crossorigin="anonymous"></script>
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

          <p>Titulo del album: "Album de recuerdos"</p>
    
            <p>Texto Adicional: De parte de ...</p>

            <p>Correo Electronico: mafilg@gmail.com</p>

  
            <p>Direccion de Entrega:</p>
            <p>Calle: Fuencaliente</p>
            
            <p>Numero: 3</p>
            
            <p>Piso: 8</p>
            
            <p>Puerta: B</p>
            
            <p>Codigo Postal: 0512</p>
            
            <p>Localidad: Valencia</p>
            
            <p>Provincia: Valencia</p>
            
            <p>Pais: España</p>
            
            <p>Telefono: "sin especificar" </p>
            
          <p>Color de portada:</p> <!--AQUI IRIA UN DIV CON UN BACK GROUND COLOR A LA DERECHA-->
  
           <p>Numero de copias: 2</p>
  
           <p>Resolucion Fotos: 450 DPI</p>
              
           <p>Fecha de entrega: 24/11/2020</p>
  
           <p>Color: B/N</p>

          <p>Coste: 72,95€</p>
          
          <p class="enviar"><button>Aceptar</button> <a href="index_logged.html"></a> </p>
        
        </article>

    </main>
    <footer>
      <h3><a href="acerca.html">Acerca</a></h3>
          Copyright &copy; DAW <time datetime="2020">2020</time>
    </footer>
  </body>
</html>
