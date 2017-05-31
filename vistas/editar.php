<?php 
    
	$controlador = new ControladorCursos();
	$resultado = $controlador->getdocentes();

	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}

	if (isset($_POST['enviar'])) {
		$controlador->editar($_GET['curso_id'],$_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['selectid']);
		header('Location: index.php');
	}

 ?>



 <form action="" method="POST">
 	Id curso: <br>
 	<input type="text" name="curso_id" value="<?php echo $row['curso_id']; ?>" disabled>
 	<br><br>
 	Sigla: <br>
 	<input type="text" name="sigla" value="<?php echo $row['sigla']; ?>" required>
 	<br><br>
 	Titulo: <br>
 	<input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
 	<br><br>
 	Resumen: <br>
 	<input type="text" name="resumen" value="<?php echo $row['resumen']; ?>" required>
 	<br><br>
 	Fecha de inicio: <br>
 	<input type="date" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required>
 	<br><br>
 	Docente: <br>
 	<select name='selectid'>
 		<?php while ($row = mysql_fetch_array($resultado)): ?>
  		<option value="<?php echo $row['id']; ?>" required><?php echo $row['nombre']; ?></option>
  		<?php endwhile; ?>
	</select>
 	<br><br>
 	<input type="submit" name="enviar" value="Editar">
 </form>