<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	} else {
		header("Location: index.php");
	}

	if (isset($_POST['enviar'])) {
		$controlador->eliminar($_GET['id']);
		header("Location: index.php");
	}
 ?>
<br><br>
 ¿Usted de verdad quiere eliminar el curso de: <?php echo $row['titulo'] ?>?
 <br><br>

 <form action="" method="POST">
 	<input type="submit" name="enviar" value="Eliminar">
 </form>