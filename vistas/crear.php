<?php 
	$controlador = new ControladorCursos();
	if (isset($_POST['enviar'])) {
		$r = $controlador->crear($_POST['id'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['docente_id']);

		if ($r) {
			echo "Se ha registrado un nuevo curso";
		} else {
			echo "El curso que esta intentando registrar ya existe";
		}
	}
?>
<h3>Registro de un nuevo curso</h3>
<hr>
<form action="" method="POST">
	<label>id</label><br>
	<input type="number" name="id" required>
	<br><br>
	<label>titulo</label><br>
	<input type="text" name="titulo" maxlength="30" required>
	<br><br>
	<label>resumen</label><br>
	<input type="text" name="resumen" maxlength="500" required>
	<br><br>
	<label>fecha de inicio</label><br>
	<input type="date" name="fecha_inicio" required>
	<br><br>
	<label>id del docente</label><br>
	<input type="number" name="docente_id" required>
	
	<input type="submit" name="enviar" value="Crear">
</form>