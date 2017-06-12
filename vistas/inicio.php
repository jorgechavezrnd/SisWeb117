<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();
?>

<table id="tablaCursos">
	<?php $index = 0; ?>
	<tr>
		<?php while ($row = mysql_fetch_array($resultado)): ?>
			<?php $index++; ?>
			<th class="curso">
				<figure class="figura">
					<h3 class="titulo">
						<?php echo $row['titulo']; ?>
					</h3>
					<p class="description">
						<img src="data:image;base64, <?php echo $row['imagecontent']?>" class="imagenCurso" />
						<?php if(strlen($row['resumen'])>=150){
							echo substr($row['resumen'],0,(strlen($row['resumen'])/3)).'...';
						}else{
							echo $row['resumen'];	
						} ?>
					</p>
					<br/>
					<a href="index.php?cargar=ver&curso_id=<?php echo $row['curso_id']; ?>">Ver Detalle</a>
					 <?php echo " | " ?><a href="index.php?cargar=editar&curso_id=<?php echo $row['curso_id']; ?>">Editar</a><?php echo " | " ?><a href="index.php?cargar=eliminar&curso_id=<?php echo $row['curso_id']; ?>">eliminar</a>
				</figure>
			</th>
			<?php
				if($index % 2 == 0) {
					echo '</tr><tr>';
				}
				endwhile;
				if($index == 1) {
					echo '<th></th>';
				} 
			?>
	</tr>
</table>