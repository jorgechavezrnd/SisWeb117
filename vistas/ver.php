<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['id'])) {
		$row = $controlador->ver($_GET['id']);
	} else {
		header("Location: index.php");
	}
 ?>
<br><br>
<b>Id:</b> <?php echo $row['id'] ?>
<br><br>

<b>titulo:</b> <?php echo $row['titulo'] ?>
<br><br>

<b>resumen:</b> <?php echo $row['resumen'] ?>
<br><br>

<b>Fecha de inicio:</b> <?php echo $row['fecha_inicio'] ?>
<br><br>

<b>id docente:</b> <?php echo $row['docente_id'] ?>
<br><br>