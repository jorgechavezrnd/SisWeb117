<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}
?>

<head>
	<title>Ver curso</title>
	<link href="css/estiloVer.css" rel="stylesheet">

</head>
<body style="background-image:url(imagenes/ucbFondo.jpg) ">
	<div>
	<div id="vista"> 
		<img src="imagenes/python.jpg" class="wrap align-right"> 
		<p id="title" font="Arial"><i><?php echo $row['titulo'] ?></i></p>
		<p id="text" font="Arial">Docente: <?php echo $row['nombre'] ?></p>
		<p id="text" font="Arial">Curso: <?php echo $row['sigla'] ?></p>
		<p id="text" font="Arial">Fecha de inicio: <?php echo $row['fecha_inicio'] ?></p>
		<div>
			<p id="text" font="Arial">
				<?php echo $row['resumen'] ?>
			</p>
		</div>
	</div>
	<br></br>
	<a href="index.php" class="myButton">Atrás</a>
	</div>
</body>