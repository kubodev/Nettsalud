<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Pedidos</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Pedidos</li>
		</ol>
	</section>

	<section class="seccion">
	<div class="table-responsive">
		<?php if($_GET['Archivadas'] == 1) { ?><a href="?"><button class="mini boton">VER ORDENES EN LISTA</button></a><?php } else { ?><a href="?Archivadas=1"><button class="mini boton">VER ORDENES ARCHIVADAS</button></a><?php }?>
		<div class="clear" style="HEIGHT:30PX"></div>
			    <table class="usuarios">
			      <thead>
			        <tr>
			        <th>Número de Pedido</th>
			          <th>Fecha</th>
			          <th>Nombre</th>
			          <th>Tipo de pago</th>
			          <th>Estado</th>
			          <th>Acción</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php
			      	foreach($Pedido->obtenerPedidos() as $idPedido)
			      	{
			      		$noMostrar = 0;
			      		$numeroorden = $Pedido->obtenerAtributo($idPedido)['NumeroOrden'];
			      		$fecha = fecha($Pedido->obtenerAtributo($idPedido)['Fecha']);
			      		$nombre = $Pedido->DatosPersonalesComprador($idPedido)['Nombre'];
			      		$tipoPago = $Pedido->nombreMetodoPago($Pedido->obtenerAtributo($idPedido)['idMetodoPago']);
			      		$estado = $Pedido->nombreEstado($idPedido);
			      		$estadoPago = $Pedido->nombreEstadoPago($idPedido);
			      		if($Pedido->obtenerAtributo($idPedido)['idMetodoPago'] == 1&&!$Pedido->EstaPagado($idPedido)) $noMostrar = 1;
			      		if($_GET['Archivadas'] == 1) { if($estado != "Archivado") $noMostrar = 1; }
			      		else
			      		{
			      			if($estado == "Archivado") $noMostrar = 1;
			      		}
			      		
			      			if($noMostrar == 0)
			      			{
			      				if($Pedido->obtenerAtributo($idPedido)['idMetodoPago'] == 1) 
			      				{
			      					mysql_query("UPDATE Pedido SET idEstadoPago = '2' WHERE idPedido = '".$idPedido."'");
			      				}
					      		?>
						        <tr
						        <?php 
						        if($estado == "Por entregar") echo ' class="porEntregar"'
						        ?>
						        >
						          <td><?php echo $numeroorden; ?></td>
						          <td><?php echo $fecha; ?></td>
						          <td><?php echo $nombre; ?></td>
						          <td><?php echo $tipoPago; ?></td>
						          <td><?php echo $estado; ?> / <?php echo $estadoPago; ?></td>
						          <td><a href="abrir/?idPedido=<?php echo $idPedido; ?>">Ver pedido</a></td>
						        </tr>
						 	   <?php
							}
						
			      	}
			      	?>
			      </tbody>
			    </table>
			  </div>
	</section>
</div>