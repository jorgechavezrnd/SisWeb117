<?php 
	$controlador = new ControladorCursos();
	if (isset($_GET['curso_id'])) {
		$row = $controlador->ver($_GET['curso_id']);
	} else {
		header("Location: index.php");
	}
	$login = 0;
?>

<head>
	<title>Ver curso</title>
	<link href="css/estiloVer.css" rel="stylesheet">

</head>
<body style="background-image:url(imagenes/ucbFondo.jpg) ">
	<div>
	<div id="vista">
		<img id="imagenIcono" src="data:image;base64, <?php echo $row['imagecontent']?>" class="wrap align-right"> 
		<p id="title" font="Arial"><i><?php echo $row['titulo'] ?></i></p>
		<p id="text" font="Arial">Docente: <?php echo $row['docente'] ?></p>
		<p id="text" font="Arial">Curso: <?php echo $row['sigla'] ?></p>
		<p id="text" font="Arial">Fecha de inicio: <?php echo $row['fecha_inicio'] ?></p>
		<div>
			<p id="text" font="Arial">
				<?php echo $row['resumen'] ?>
			</p>
		</div>
		<br></br>
		
	</div>
	<br></br>
	<?php if ($login == 1){ ?>
			<a class="myButton" href="index.php?cargar=editar&curso_id=<?php echo $row['curso_id']; ?>">Editar</a>  <a class="myButton" href="index.php?cargar=eliminar&curso_id=<?php echo $row['curso_id']; ?>">Eliminar</a> <a href="index.php" class="myButton">Atrás</a>
	<?php }else{ ?>
			<a href="index.php" class="myButton">Atrás</a>
	<?php } ?>
	
	</div>
</body>