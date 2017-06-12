<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}

	if (isset($_POST['enviar'])) {
		$controlador->eliminar($_GET['curso_id']);
		header("Location: index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
	<link href="css/estiloEliminar.css" rel="stylesheet">
</head>
<body style="background-image:url(imagenes/ucbFondo.jpg);">

	<div id="vista"> 
		<p id="text" font="Arial">¿Seguro que desea eliminar el curso: <?php echo $row['titulo'] ?>?</p>
		<form action="" method="POST">
 			<a id="buttonC" href="index.php" class="myButton">Cancelar</a> <input id="buttonA" type="submit" class="myButton" name="enviar" value="Eliminar">

 		</form>
	</div>

</body>
</html>