<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();
?>
<h3>Pagina de inicio</h3>
<table border="1">
	<thead>
		<th>Id</th>
		<th>titulo</th>
		<th>resumen</th>
		<th>fecha de inicio</th>
		<th>docente id</th>
		
		<th>Acción</th>
	</thead>
	<tbody>
		<?php while ($row = mysql_fetch_array($resultado)): ?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['titulo'] ?></td>
				<td><?php echo $row['resumen'] ?></td>
				<td><?php echo $row['fecha_inicio'] ?></td>
				<td><?php echo $row['docente_id'] ?></td>
				<td>
				<a href="?cargar=ver&id=<?php echo $row['id']; ?>">Ver</a>
				<a href="?cargar=editar&id=<?php echo $row['id']; ?>">Editar</a>
				<a href="?cargar=eliminar&id=<?php echo $row['id']; ?>">Eliminar</a>
				</td>
			</tr>

		<?php endwhile; ?>
	</tbody>
</table>