
<?php

session_start();

if($_SESSION["s_usuario"] === null){
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    
<header>
    <div class="logo-rd">
        <img src="../images/inicio.png" id="logord" alt="">
        
    </div>
    <div id="search" class="icon-search">
        <input type="search" class="icono-search" placeholder="Ingresa tu busqueda ">
        <i class="fas fa-search"></i>

        <div class="enlaces">
        <a class="links" href="home.php">Inicio</a>
        <a class="links" href="http://www.hospitalcalventi.gob.do/index.php/mapa-de-sitio">Mapa de sitio</a>
        <a class="links" href="http://www.hospitalcalventi.gob.do/index.php/contacto">Contacto</a>

        </div>
    </div>

    <div class="hospital-logo">
        <img src="../images/logo.png" id="logo1" alt="">
        </div>
</header>

<section class="menu">
  <a class="active" href="home.php">Inicio</a>
  <a href="http://www.hospitalcalventi.gob.do/index.php/sobre-nosotros/quienes-somos">Sobre Nosotros</a>
  <a href="http://www.hospitalcalventi.gob.do/index.php/servicios">Servicios</a>
  <a href="http://www.hospitalcalventi.gob.do/index.php/contacto">Contacto</a>
  

</section>
</body>
</html>

