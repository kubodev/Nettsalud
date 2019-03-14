<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Etiquetas</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Etiquetas</li>
		</ol>
	</section>

	<section class="seccion">
	<?php
		$sql = mysql_query("SELECT * FROM PublicacionCategoria");
		if(mysql_num_rows($sql) > 0){?>
		<section class="seccion">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Cantidad</th>
						<th>Acción</th>
					</tr>
			<?php while($col = mysql_fetch_array($sql)){?>
					<tr>
						<td><?php echo $col['idPublicacionCategoria']; ?></td>
						<td><?php echo $col['Nombre']; ?></td>
						<td><?php echo $Publicacion->cantidadCat($col['idPublicacionCategoria']);?></td>
						<td>
							<a href="editar/?idPublicacionCategoria=<?php echo $col['idPublicacionCategoria']; ?>" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="eliminar/?idPublicacionCategoria=<?php echo $col['idPublicacionCategoria']; ?>" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>
		<?php } ?>
				</table>
			</div>
		</section>
		<?php } else MsjError('Aún no tienes etiquetas creadas.');
		?>
	</section>
	<section class="seccion">
		<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nueva etiqueta</a>
	</section>
</div>