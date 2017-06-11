<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();
?>
<h3>Cursos de formacion continua</h3>
<table class="table table-striped table-hover">
	<thead>
	<tr>
		<th>Id curso</th>
		<th>Sigla</th>
		<th>Titulo</th>
		<th>Resumen</th>
		<th>Fecha de inicio</th>
		<th>Nombre de docente</th>
		<th>Acción</th>
	</tr>
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
				<a class="btn btn-info" href="?cargar=ver&curso_id=<?php echo $row['curso_id']; ?>">Ver</a>
				<a class="btn btn-warning" href="?cargar=editar&curso_id=<?php echo $row['curso_id']; ?>">Editar</a>
				<a class="btn btn-danger" href="?cargar=eliminar&curso_id=<?php echo $row['curso_id']; ?>">Eliminar</a>
				</td>
			</tr>

		<?php endwhile; ?>
	</tbody>
</table>