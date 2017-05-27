<?php 
	$controlador = new ControladorCursos();
	$aux='CFP-';
	$resultado=strpos($_POST['sigla'], $aux);
	$resultado2 = $controlador->getdocentes();
	if (isset($_POST['enviar'])) {
		if ($resultado===0) {
    		$r = $controlador->crear($_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['selectid']);
    		if ($r) {
				echo "Se ha registrado un nuevo curso";
			} else {
				echo "El curso que esta intentando registrar ya existe";
			}
    	}else {
        	echo "Formato de sigla invalido";
	    }
		

		
	}
?>
<h3>Registro de un nuevo curso</h3>
<hr>
<form action="" method="POST">
	<label>Sigla</label><br>
	<input type="text" name="sigla" maxlength="7" required>
	<br><br>
	<label>Titulo</label><br>
	<input type="text" name="titulo" minlength="1" maxlength="30" required>
	<br><br>
	<label>Resumen</label><br>
	<input type="text" name="resumen" minlength="1" maxlength="500" required>
	<br><br>
	<label>Fecha de inicio</label><br>
	<input type="date" name="fecha_inicio" required>
	<br><br>
	<label>Docente</label><br>
	<select name='selectid'>
 		<?php while ($row = mysql_fetch_array($resultado2)): ?>
  		<option value="<?php echo $row['id']; ?>" required><?php echo $row['nombre']; ?></option>
  		<?php endwhile; ?>
	</select>
	<input type="submit" name="enviar" value="Crear">
</form>