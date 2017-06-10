<?php 
	$controlador = new ControladorCursos();
	$resultado2 = $controlador->getdocentes();
	if (isset($_POST['enviar'])) {
    	$controlador->crear($_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['selectid']);
		echo "Se ha registrado un nuevo curso";
	}
?>
<h3>Registro de un nuevo curso</h3>


<form class="form-horizontal" action="" method="POST">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Titulo</label>
      <div class="col-lg-5">
        <input type="text" name="titulo" class="form-control" id="inputEmail" placeholder="Titulo">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Sigla</label>
      <div class="col-lg-5">
        <input type="text" name="sigla" class="form-control" id="inputEmail" placeholder="Sigla">
      </div>
    </div>
    <div class="form-group">
      <label for="inputdate" class="col-lg-2 control-label">Fecha inicio</label>
      <div class="col-lg-5">
        <input type="date" name="fecha_inicio" class="form-control" id="inputPassword" placeholder="Fecha inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Docente</label>
      <div class="col-lg-5">
		<select name='selectid'>
	 		<?php while ($row = mysql_fetch_array($resultado2)): ?>
	  		<option value="<?php echo $row['id']; ?>" required><?php echo $row['nombre']; ?></option>
	  		<?php endwhile; ?>
		</select>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Resumen</label>
      <div class="col-lg-5">
        <textarea class="form-control" name="resumen" rows="3" id="textArea"></textarea>
        <span class="help-block">Descripción del curso.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="enviar" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>




