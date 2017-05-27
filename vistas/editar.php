<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	} else {
		header("Location: index.php");
	}

	if (isset($_POST['enviar'])) {
		$controlador->editar($_GET['id'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['docente_id']);
		header('Location: index.php');
	}

 ?>

 <form action="" method="POST">
 	Id: <br>
 	<input type="text" name="id" value="<?php echo $row['id']; ?>" disabled>
 	<br><br>
 	titulo: <br>
 	<input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
 	<br><br>
 	resumen: <br>
 	<input type="text" name="resumen" value="<?php echo $row['resumen']; ?>" required>
 	<br><br>
 	fecha de inicio: <br>
 	<input type="date" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required>
 	<br><br>
 	id del docente: <br>
 	<input type="number" name="docente_id" value="<?php echo $row['docente_id']; ?>" required>
 	
 	<input type="submit" name="enviar" value="Editar">
 </form>