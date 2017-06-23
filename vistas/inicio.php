<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();

	$login = 1;
?>

<table id="tablaCursos">
	<?php $index = 0; ?>
	<tr>
		<?php $lista = array(); ?>
		<?php while ($row = mysql_fetch_array($resultado)) {
			$lista[] = $row;
		}
		?>
		<?php $i = count($lista) - 1; ?>

		<?php while ($i >= 0): ?>
			<?php $row = $lista[$i] ?>
			<?php $index++; ?>
			<th class="curso">
				<figure class="figura">
					<h3 class="titulo">
						<?php echo $row['titulo']; ?>
					</h3>
					<p class="description">
						<img src="data:image;base64, <?php echo $row['imagecontent']?>" class="imagenCurso" />
						<?php if(strlen($row['resumen'])>175){
							echo substr($row['resumen'],0,150).'...'.'<a href="index.php?cargar=ver&curso_id='.$row['curso_id'].'">Ver Detalle</a>';
						}else{
							echo $row['resumen'];	
						} ?>
					</p>
					<br/>
					<a href="index.php?cargar=ver&curso_id=<?php echo $row['curso_id']; ?>">Ver Detalle</a>
					<?php if ($login == 1): ?>
					 	<?php echo " | " ?><a href="index.php?cargar=editar&curso_id=<?php echo $row['curso_id']; ?>">Editar</a><?php echo " | " ?><a href="index.php?cargar=eliminar&curso_id=<?php echo $row['curso_id']; ?>">eliminar</a>
			 		<?php endif; ?>
				</figure>
			</th>
			<?php
				if($index % 2 == 0) {
					echo '</tr><tr>';
				}
				$i--;
				endwhile;
				if($index == 1) {
					echo '<th></th>';
				} 
			?>
	</tr>
</table>