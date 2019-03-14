<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	if($_GET['idMetodoPago'] > 1)
	{
		if($_FILES['img'][ 'name'])
		{
			if(esImagen($_FILES['img'][ 'name']))
			{
				$dir=explode('inc',dirname(__FILE__));
				$destino = $dir[0].'img';
				$nombreFoto = cadenatexto(12); // Genera string aleatoriamente
				move_uploaded_file($_FILES['img']['tmp_name'],$destino . '/' .$nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]));
				$archivoFoto = $nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]);
			} else { MsjError("Debes subir una imagen"); break; }
			mysql_query("INSERT INTO EvidenciaPago (`img`) VALUES ('".$archivoFoto."')");
			$idEvidenciaPago = mysql_insert_id();
			$_SESSION['Pedido']['idEvidenciaPago'] = $idEvidenciaPago;
		}
		$_SESSION['Pedido']['idMetodoPago'] = $_GET['idMetodoPago'];
		$Pedido->enviar();
	}
	else
	{
		$ordenCompra = $Carro->generarOrdenCompra();
		$totalAPagar = $Carro->totalPedido();
		$idCostoEnvio = $_SESSION['Pedido']['idCostoEnvio'];
		$costoEnvio = $Pedido->ZonaEnvio($idCostoEnvio)['Costo'];
		$totalAPagar += $costoEnvio;
		$array['idUsuarios'] = $_SESSION['idUsuarios'];
		$MedioPago->transaccion($ordenCompra,1,$totalAPagar,$array);
	}


?>