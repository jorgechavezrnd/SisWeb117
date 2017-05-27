<?php 
	include_once("modulos/enrutador.php");
	include_once("modulos/controlador.php");
 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<meta charset="utf-8"/>
	 	<title>Curso POO con PHP</title>
	 </head>
	 <body>

				<a href="index.php">Inicio</a>
	 			<a href="?cargar=crear">Registrar</a>
	 	
	 		<?php 
	 			$enrutador = new Enrutador();
	 			if ($enrutador->validarGET($_GET['cargar'])) {
	 				$enrutador->cargarVista($_GET['cargar']);
	 			}
	 		 ?>

	 </body>
 </html>