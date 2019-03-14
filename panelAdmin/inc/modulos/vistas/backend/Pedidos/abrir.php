<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Pedidos</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>pedidos">Pedidos</a></li>
			<li class="active">Abrir</li>
		</ol>
	</section>

	<section class="seccion">
	<div class="table-responsive">
		<h1 class="titulo">Información del comprador</h1>
		<br>
			<?php
			$idPedido = $_GET['idPedido'];
			foreach($Pedido->DatosPersonalesComprador($idPedido) as $NombreAtributo => $Detalle)
			{
				?>
				<b><?php echo $NombreAtributo; ?>:</b> <?php echo $Detalle; ?><br>
				<?php
			}
			?>
			<br><br>
			<h1 class="titulo">Características del pedido</h1>
			<?php
			$numeroOrden = $Pedido->obtenerAtributo($idPedido)['NumeroOrden'];
			$tipoPago = $Pedido->nombreMetodoPago($Pedido->obtenerAtributo($idPedido)['idMetodoPago']);
			$tipoEnvio = $Pedido->nombreMetodoEnvio($Pedido->obtenerAtributo($idPedido)['idMetodoEnvio']);

			?>
			<br><br>
			<b>Número de Orden</b>: <?php echo $numeroOrden; ?><br>
			<b>Forma de pago</b>: <?php echo $tipoPago; ?>
			<?php
			/*if($Pedido->obtenerAtributo($idPedido)['idMetodoPago'] == 4)
			{
				?>
				 - <a target="_blank" href="<?php echo $ruta; ?>img/<?php echo $Pedido->EvidenciaPago($idPedido); ?>">Ver evidencia de pago</a>
				<?php
			}*/
			?>
			<?php
			$sql = mysql_query("SELECT * FROM rel_Pedido_CodigoDescuento WHERE idPedido = '".$idPedido."'");
			if(mysql_num_rows($sql))
			{
				$col = mysql_fetch_array($sql);
				?>
				<br>
				<b>Código de descuento</b>: <?php echo $Producto->CodigoInformacion($col['idCodigoDescuento'])['Codigo']; ?><br>
				<?php
				if($Producto->CodigoInformacion($col['idCodigoDescuento'])['Porcentaje']>0)
				{
					?>
					<b>Porcentaje de descuento</b>: <?php echo $Producto->CodigoInformacion($col['idCodigoDescuento'])['Porcentaje']; ?>%<br>
					<?php
				}
				else if($Producto->CodigoInformacion($col['idCodigoDescuento'])['Monto']>0)
				{
					?>
					<b>Monto de descuento</b>: $<?php echo $Producto->CodigoInformacion($col['idCodigoDescuento'])['Monto']; ?><br>
					<?php
				}
			}
			?>
			<br>
			<b>Envío</b>: 
			<?php 
			if($Pedido->obtenerAtributo($idPedido)['idCostoEnvio'] > 0)
			{
				echo $Pedido->ZonaEnvio($Pedido->obtenerAtributo($idPedido)['idCostoEnvio'])['Zona']; ?> (<?php echo $Pedido->ZonaEnvio($Pedido->obtenerAtributo($idPedido)['idCostoEnvio'])['Costo']; ?>)<br>
				<?php
			}
			else
			{
				?>
				<?php echo $tipoEnvio; ?><br>
				<?php
			}
			?>
			<b>Estado de Pedido</b>: 
			<select name="idEstadoPedido">
				<?php 
				$sql = mysql_query("SELECT * FROM EstadoPedido");
				while($col = mysql_fetch_array($sql))
				{
					?>
					<option value="<?php echo $col['idEstadoPedido']; ?>" <?php if($Pedido->obtenerAtributo($idPedido)['idEstadoPedido'] == $col['idEstadoPedido']) echo 'selected'; ?>><?php echo $col['detalle']; ?></option>
					<?php
				}
				?>
			</select><br>
			<b>Estado de Pago</b>: 
			<select name="idEstadoPago">
				<?php 
				$sql = mysql_query("SELECT * FROM EstadoPago");
				while($col = mysql_fetch_array($sql))
				{
					?>
					<option value="<?php echo $col['idEstadoPago']; ?>" <?php if($Pedido->obtenerAtributo($idPedido)['idEstadoPago'] == $col['idEstadoPago']) echo 'selected'; ?>><?php echo $col['detalle']; ?></option>
					<?php
				}
				?>
			</select>
			<br><br>
			<h1 class="titulo">Productos</h1>
			<br><br>
			    <table class="usuarios">
			      <thead>
			        <tr>
			          <th>Producto</th>
			          <th>Precio</th>
			          <th>SKU</th>
			         
			          <th>Cantidad</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php
			      	$total = 0;
			      	if($Configuracion['SistemaModelos'] == 1)
			      	{
				     	foreach($Pedido->obtenerProductos($idPedido) as $Item)
				      	{
				      		$sql = mysql_query("SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE SKU = '".$Item['SKU']."' LIMIT 1");
				      		$col = mysql_fetch_array($sql);
				      		$idRel_ProductoAtributoDetalle_Producto = $col['idRel_ProductoAtributoDetalle_Producto'];
				      		$idProducto = $Item['idProducto'];
				      		$cantidad = $Item['Cantidad'];
				      		$nombre = $Producto->obtenerInformacion($idProducto)['Nombre'];
				      		$modelo = $Producto->NombreModelo($Item['SKU']);
				      		$precio = formatoMoneda($Producto->precioFinal($idProducto,$idRel_ProductoAtributoDetalle_Producto));
				      		?>
					        <tr>
					          <td><?php echo $nombre; ?></td>
					           <td><?php echo $precio; ?></td>
					          <td><?php echo $modelo; ?> (SKU: <?php echo $Item['SKU']; ?>)</td>
					         
					          <td><?php echo $cantidad; ?></td>
					        </tr>
					   	 <?php
					   	 $total+=$Producto->precioFinal($idProducto,$idRel_ProductoAtributoDetalle_Producto);
				      	}
				      }
				      else
				      {
				      	foreach($Pedido->obtenerProductos($idPedido) as $Item)
				      	{
				      		$idProducto = $Item['idProducto'];
				      		$cantidad = $Item['Cantidad'];
				      		$sql = mysql_query("select * from rel_ProductoAtributoDetalle_Producto where idRel_ProductoAtributoDetalle_Producto = '".$Item['idRel_ProductoAtributoDetalle_Producto']."'");
				      		$col = mysql_fetch_array($sql);
				      		$sku = $col['SKU'];
				      		$nombre = $Producto->obtenerInformacion($idProducto)['Nombre'];
				      		$sku = $Producto->obtenerInformacion($idProducto)['Codigo'];
				      		?>
					        <tr>
					         <td><?php echo $nombre; ?></td>
					         <td><?php echo formatoMoneda($Producto->obtenerAtributo('Precio',$idProducto)); ?></td>
					         <td><?php echo $sku; ?></td>
					          <td><?php echo $cantidad; ?></td>
					        </tr>
					    <?php
					    	$total += $Producto->obtenerAtributo('Precio',$idProducto)*$cantidad;
				      	}
				      }

			      	?>
			      	<tr><td><b>Total</b></td><td><?php echo formatoMoneda($total); ?></td></tr>
			      </tbody>
			    </table>
			    <?php
			    $dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_PedidoAbrir.php"); 
				?>
			  </div>
	</section>
</div>