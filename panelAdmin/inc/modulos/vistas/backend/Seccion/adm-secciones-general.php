<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Pestañas de contenido</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Pestañas de contenido</li>
		</ol>
	</section>

	<?php
	$sql=mysql_query("SELECT * FROM Seccion ORDER BY idSeccion ASC");
	if(mysql_num_rows($sql)){ ?>
	<section class="seccion">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Acción</th>
				</tr>
				<?php while($row=mysql_fetch_array($sql)){ ?>
				<tr>
					<td><?php echo $row['idSeccion']; ?></td>
					<td><?php echo $seccion->obtenerTitulo($row['idSeccion']); ?></td>
					<td>
						<a href="seccion.php?idSeccion=<?php echo $row['idSeccion']; ?>" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</section>
	<?php } else{
		msjError("Aún no hay secciones.");
	} ?>
</div>