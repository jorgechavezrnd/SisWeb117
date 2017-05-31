<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}
 ?>
 <br><br>
<b>Id curso:</b> <?php echo $row['curso_id'] ?>

<br><br>
<b>Sigla:</b> <?php echo $row['sigla'] ?>
<br><br>

<b>Titulo:</b> <?php echo $row['titulo'] ?>
<br><br>

<b>Resumen:</b> <?php echo $row['resumen'] ?>
<br><br>

<b>Fecha de inicio:</b> <?php echo $row['fecha_inicio'] ?>
<br><br>

<b>Nombre del docente:</b> <?php echo $row['nombre'] ?>
<br><br>