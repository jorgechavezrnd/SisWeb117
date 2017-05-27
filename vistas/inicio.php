<?php 
	$controlador = new ControladorCursos();
	$resultado = $controlador->index();
?>
<h3>Cursos de formacion continua</h3>
<table border="1">
	<thead>
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
				<td><?php echo $row['sigla'] ?></td>
				<td><?php echo $row['titulo'] ?></td>
				<td><?php echo $row['resumen'] ?></td>
				<td><?php echo $row['fecha_inicio'] ?></td>
				<td><?php echo $row['nombre'] ?></td>
				<td>
				<a href="?cargar=ver&sigla=<?php echo $row['sigla']; ?>">Ver</a>
				<a href="?cargar=editar&sigla=<?php echo $row['sigla']; ?>">Editar</a>
				<a href="?cargar=eliminar&sigla=<?php echo $row['sigla']; ?>">Eliminar</a>
				</td>
			</tr>

		<?php endwhile; ?>
	</tbody>
</table>