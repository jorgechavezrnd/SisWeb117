<?php 
	$controlador = new ControladorCursos();
	if (isset($_POST['enviar'])) {
    if($_FILES['image']['tmp_name']==null){
      echo "Ingrese una imagen";
    }else{
      $image = addslashes($_FILES['image']['tmp_name']);
      $name = addslashes($_FILES['image']['name']);
      $image = file_get_contents($image);
      $image = base64_encode($image);
      $controlador->crear($_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['docente'],$name,$image);
       echo "Se ha registrado un nuevo curso";	
    }
  }	

?>

<p style="font-size: 35pt;">Registro de un nuevo curso</p>
<br></br>
<body>
<form method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Titulo</label>
      <div class="col-lg-5">
        <input type="text" maxlength="30" minlength="1" name="titulo" class="form-control" id="inputEmail" placeholder="Titulo" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Sigla</label>
      <div class="col-lg-5">
        <input type="text" maxlength="8" name="sigla" class="form-control" id="inputEmail" placeholder="Sigla" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdate" class="col-lg-1 control-label">Fecha inicio</label>
      <div class="col-lg-5">
        <input type="date" name="fecha_inicio" class="form-control" id="inputPassword" placeholder="Fecha inicio" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputDocente" class="col-lg-1 control-label">Docente</label>
      <div class="col-lg-5">
  		  <input type="text" minlength="1" name="docente" class="form-control" id="inputDocente" placeholder="Docente" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-1 control-label">Resumen</label>
      <div class="col-lg-5">
        <textarea class="form-control" minlength="1" maxlength="2048" name="resumen" rows="12" id="textArea" required="required"></textarea>
        <span class="help-block">Descripción del curso.</span>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-1 control-label">Imagen</label>
      <div class="col-lg-5">
           <input type="file" name="image"/>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-1">
        <button type="submit" name="enviar" value="upload" class="btn btn-primary">Enviar</button>
        <a href="index.php" class="btn btn-default">Cancelar</a>
      </div>
    </div>

</form>
</body>



