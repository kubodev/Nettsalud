<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	
		
		
			$ordenCompra = $Carro->generarOrdenCompra();
			$totalAPagar = $Carro->totalPedido();
			if(strlen($_SESSION['CodigoDescuento']['Codigo'])>0)
			{
				if($Producto->CodigoInformacionPorCodigo($_SESSION['CodigoDescuento']['Codigo'])['Monto'] > 0)
				{
					$montoDscto = $Producto->CodigoInformacionPorCodigo($_SESSION['CodigoDescuento']['Codigo'])['Monto'];
				}
				else if($Producto->CodigoInformacionPorCodigo($_SESSION['CodigoDescuento']['Codigo'])['Porcentaje'] > 0)
				{
					$montoDscto = $Carro->totalPedido()*($Producto->CodigoInformacionPorCodigo($_SESSION['CodigoDescuento']['Codigo'])['Porcentaje']/100);
				}
				$totalAPagar = $totalAPagar-$montoDscto;
			}
			$idCostoEnvio = $_SESSION['Pedido']['idCostoEnvio'];
			$costoEnvio = $Pedido->ZonaEnvio($idCostoEnvio)['Costo'];
			$totalAPagar+=$costoEnvio;
			$MedioPago->transaccion($ordenCompra,1,$totalAPagar,$_SESSION['Pedido']['DatosPersonales']);
			MsjAprob("Redirigiendo al medio de pago");
	
?>
