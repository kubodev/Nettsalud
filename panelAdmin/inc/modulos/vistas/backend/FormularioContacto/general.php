

<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Formularios de contacto</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Formularios de contacto</li>
		</ol>
	</section>

	<section class="seccion">
	<div class="table-responsive">
			    <table class="usuarios">
			      <thead>
			        <tr>
			          <th>Fecha</th>
			          <th>Nombre</th>
			          <th>E-mail</th>
			          <th>Estado</th>
			          <th>Acción</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php
			      	$contador=0;
			      	foreach($FormularioContacto->ObtenerFormularios() as $idFormularioContacto)
			      	{
			      		$fecha = fecha($FormularioContacto->ObtenerAtributo($idFormularioContacto)['Fecha']);
			      		$nombre = $FormularioContacto->ObtenerInformacion($idFormularioContacto)['Nombre'];
			      		$email = $FormularioContacto->ObtenerInformacion($idFormularioContacto)['E-mail'];
			      		$estado = $FormularioContacto->nombreEstado($idFormularioContacto);
			      		
				      		?>
					        <tr
					        <?php 
					        if(!$FormularioContacto->Leido($idFormularioContacto)) echo ' class="porEntregar"'
					        ?>
					        >
					          <td><?php echo $fecha; ?></td>
					          <td><?php echo $nombre; ?></td>
					          <td><?php echo $email; ?></td>
					          <td><?php echo $estado; ?></td>
					          <td><a href="abrir/?idFormularioContacto=<?php echo $idFormularioContacto; ?>">Ver</a></td>
					        </tr>
					    <?php
						$contador++;
			      	}

			      	?>
			      </tbody>
			    </table>
			    <?php if($contador==0) MsjError("Aún no tienes formularios de contacto"); ?>
			  </div>
	</section>
</div>