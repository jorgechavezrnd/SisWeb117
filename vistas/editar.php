<?php 
    
	$controlador = new ControladorCursos();
	$resultado = $controlador->getdocentes();

	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}

	if (isset($_POST['enviar'])) {
    if($_FILES['image']['tmp_name']==null){
      echo "Ingrese una imagen";
		 
    }else{
      $image = addslashes($_FILES['image']['tmp_name']);
      $name = addslashes($_FILES['image']['name']);
      $image = file_get_contents($image);
      $image = base64_encode($image);
      $controlador->editar($_GET['curso_id'],$_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['selectid'],$name,$image);
      header('Location: index.php');
    }
	}

 ?>

<h1>Editar curso</h1>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Titulo</label>
      <div class="col-lg-5">
 		<input type="text" class="form-control" name="titulo" value="<?php echo $row['titulo']; ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Sigla</label>
      <div class="col-lg-5">
 		<input type="text" class="form-control" name="sigla" value="<?php echo $row['sigla']; ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label for="inputdate" class="col-lg-1 control-label">Fecha inicio</label>
      <div class="col-lg-5">
       	<input type="date" class="form-control" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label for="select" class="col-lg-1 control-label">Docente</label>
      <div class="col-lg-5">
	     	<select name='selectid' class="form-control">
		 		<?php while ($row = mysql_fetch_array($resultado)): ?>
		  		<option value="<?php echo $row['id']; ?>" required><?php echo $row['nombre']; ?></option>
		  		<?php endwhile; ?>
			</select>
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-1 control-label">Resumen</label>
      <div class="col-lg-5">
        <textarea type="text" class="form-control" name="resumen" value="<?php echo $row['resumen']; ?>" required></textarea>
        <span class="help-block">Descripción del curso.</span>
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-1 control-label">Imagen</label>
      <div class="col-lg-5">
           <input type="file" name="image" />
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-1">
        <button type="submit" name="enviar" class="btn btn-primary">Editar</button>
        <button type="reset" class="btn btn-default">Cancelar</button>
      </div>
    </div>

</form>


