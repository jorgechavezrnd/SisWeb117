<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();
?>
<h3>Cursos de formacion continua</h3>
<table border="1">
	<thead>
		<th>Id curso</th>
		<th>Sigla</th>
		<th>Titulo</th>
		<th>Resumen</th>
		<th>Fecha de inicio</th>
		<th>Nombre de docente</th>
		<th>Acción</th>
	</thead>
	<tbody>
		<?php while ($row = mysql_fetch_array($resultado)): ?>
			<tr>
				<td><?php echo $row['curso_id'] ?></td>
				<td><?php echo $row['sigla'] ?></td>
				<td><?php echo $row['titulo'] ?></td>
				<td><?php echo $row['resumen'] ?></td>
				<td><?php echo $row['fecha_inicio'] ?></td>
				<td><?php echo $row['nombre'] ?></td>
				<td>
				<a href="?cargar=ver&curso_id=<?php echo $row['curso_id']; ?>">Ver</a>
				<a href="?cargar=editar&curso_id=<?php echo $row['curso_id']; ?>">Editar</a>
				<a href="?cargar=eliminar&curso_id=<?php echo $row['curso_id']; ?>">Eliminar</a>
				</td>
			</tr>

		<?php endwhile; ?>
	</tbody>
</table>