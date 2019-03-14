<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Publicaciones</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Publicaciones</li>
		</ol>
	</section>

	<?php
	$sql=mysql_query("SELECT * FROM Publicacion ORDER BY Fecha, idPublicacion DESC");
	if(mysql_num_rows($sql)){ ?>
	<section class="seccion">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Categoría</th>
					<th>Fecha</th>
					<th>Acción</th>
				</tr>
				<?php while($row=mysql_fetch_array($sql)){ ?>
				<tr>
					<td><?php echo $row['idPublicacion']; ?></td>
					<td><?php echo $Publicacion->obtenerTitulo($row['idPublicacion']); ?></td>
					<td><?php echo $Publicacion->nombreCategoria($row['idPublicacion']); ?></td>
					<td><?php echo Fecha($row['Fecha']); ?></td>
					<td>
						<a href="editar/?idPublicacion=<?php echo $row['idPublicacion']; ?>" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="eliminar/?idPublicacion=<?php echo $row['idPublicacion']; ?>" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</section>
	<?php } else{
		msjError("Aún no hay publicaciones, intenta <mark>agregar</mark> una.");
	} ?>
	<section class="seccion">
		<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nueva publicación</a>
	</section>
</div>