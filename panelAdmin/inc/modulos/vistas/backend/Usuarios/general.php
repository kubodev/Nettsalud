<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Usuarios</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Usuarios</li>
		</ol>
	</section>

	<section class="seccion">
	<div class="table-responsive">
			    <table class="usuarios">
			      <thead>
			        <tr>
			          <th>Nombre</th>
			          <th>Apellido</th>
			          <th>Email</th>
			          <th>Acción</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php
			      	$sql = mysql_query("SELECT * FROM Usuarios");
			      	while($col = mysql_fetch_array($sql)){ ?>
				        <tr>
				          <td><?php echo $Usuarios->obtenerInformacion('Nombre',$col['idUsuarios']); ?></td>
				          <td><?php echo $Usuarios->obtenerInformacion('Apellido',$col['idUsuarios']); ?></td>
				          <td><?php echo $Usuarios->obtenerInformacion('Email',$col['idUsuarios']); ?></td>
				          <td><a href="editar/?idUsuarios=<?php echo $col['idUsuarios']; ?>">Editar</a> / <a href="eliminar/?idUsuarios=<?php echo $col['idUsuarios']; ?>">Eliminar</a></td>
				        </tr>
				    <?php } ?>
			      </tbody>
			    </table>
			  </div>
	</section>
	<section class="seccion">
		<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nuevo usuario</a>
	</section>
</div>