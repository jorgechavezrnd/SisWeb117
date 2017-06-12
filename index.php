<?php 
  include_once("modulos/enrutador.php");
  include_once("modulos/controlador.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cursos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link href="estilos.css" rel="stylesheet">
  <!--<link href="css/estiloVer.css" rel="stylesheet">-->
</head>
<body>
  <header id="cabeceraIndex">
    <img src="imagenes/logo.jpg" alt="UCB logo" width="150" height="200">
    <img src="imagenes/banner.jpg" alt="baner ingenieria en sistemas" width="1050" height="200">
  </header>
  
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Inicio</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a href="?cargar=crear">Crear curso de formacion continua</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Log out</a></li>
      </ul>
    </div>
  </div>
</nav>

  <?php 
    $enrutador = new Enrutador();
    if ($enrutador->validarGET($_GET['cargar'])) {
      $enrutador->cargarVista($_GET['cargar']);
    }
  ?>

</body>
</html>