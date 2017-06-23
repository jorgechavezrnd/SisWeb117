<?php 
	$controlador = new ControladorCursos();
	if (isset($_POST['enviar'])) {
    if($_FILES['image']['tmp_name']==null){
      echo "<p style='font-size: 20pt;'>Ingrese una imagen</p>";
    }else{
      if(verificar($_POST['sigla'])){
        if(verificar($_POST['titulo'])){
          if(verificarResumen($_POST['resumen'])){
            if(verificarNombreDocente($_POST['docente'])){
              $image = addslashes($_FILES['image']['tmp_name']);
              $name = addslashes($_FILES['image']['name']);
              $image = file_get_contents($image);
              $image = base64_encode($image);
              $controlador->crear($_POST['sigla'], $_POST['titulo'], $_POST['resumen'], $_POST['fecha_inicio'], $_POST['docente'],$name,$image);
              echo "<p style='font-size: 20pt;'>Se ha registrado un nuevo curso</p>";
            }else{
              echo "<p style='font-size: 20pt;'>Caracteres invalidos en docente</p>";
            }
          }else{
            if (!verificar($_POST['resumen'])) {
                echo "<p style='font-size: 20pt;'>Caracteres invalidos en resumen</p>";
            } else {
                echo "<p style='font-size: 20pt;'>Contenido mayor a 300 caracteres</p>";
            }
          }
        }else{
          echo "<p style='font-size: 20pt;'>Caracteres invalidos en titulo</p>";
        }
      }else{
        echo "<p style='font-size: 20pt;'>Caracteres invalidos en sigla</p>";
      }
      	
    }
  }	

  function verificar($cad){
      $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_ .,;:¿¡!?"; 
      $bandera=true;
      for ($i=0; $i<strlen($cad); $i++){ 
        if (strpos($permitidos, substr($cad,$i,1))===false){ 
          if($bandera===true){
           $bandera=false;
          }   
        }
      } 
      if($bandera===true){
        return true;
      }  else{
        return false;
      }
  }

  function verificarResumen($texto) {
    if (verificar($texto)) {
      if (strlen($texto) <= 300) {
        return true;
      }
    }
    return false;
  }

  function verificarNombreDocente($cad) {
    $permitidos2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";

    for ($i=0; $i<strlen($cad); $i++) {
      if (strpos($permitidos2, substr($cad,$i,1))===false){ 
        return false;
      }
    } 

    return true;
  }

?>

<p style="font-size: 35pt;">Registro de un nuevo curso</p>
<br></br>
<body>
<form method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Titulo</label>
      <div class="col-lg-5">
        <input type="text" maxlength="30" minlength="1" name="titulo" class="form-control" id="inputEmail" placeholder="Titulo" value="<?php if(isset($_POST['titulo']) && verificar($_POST['titulo'])){echo $_POST['titulo'];}?>" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-1 control-label">Sigla</label>
      <div class="col-lg-5">
        <input type="text" maxlength="8" name="sigla" class="form-control" id="inputEmail" placeholder="Sigla" value="<?php if(isset($_POST['sigla']) && verificar($_POST['sigla'])){echo $_POST['sigla'];}?>" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputdate" class="col-lg-1 control-label">Fecha inicio</label>
      <div class="col-lg-5">
        <input type="date" name="fecha_inicio" class="form-control" id="inputPassword" placeholder="Fecha inicio" value="<?php if(isset($_POST['fecha_inicio']) && verificar($_POST['fecha_inicio'])){echo $_POST['fecha_inicio'];}?>" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="inputDocente" class="col-lg-1 control-label">Docente</label>
      <div class="col-lg-5">
  		  <input type="text" minlength="1" name="docente" class="form-control" id="inputDocente" placeholder="Docente" value="<?php if(isset($_POST['docente']) && verificar($_POST['docente'])){echo $_POST['docente'];}?>" required="required">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-1 control-label">Resumen</label>
      <div class="col-lg-5">
        <textarea class="form-control" minlength="1" maxlength="2048" name="resumen" rows="12" id="textArea" required="required"><?php if(isset($_POST['resumen']) && verificar($_POST['resumen'])){echo $_POST['resumen'];}?></textarea>
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



