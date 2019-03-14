<?php
class Pedido
{
	public function nombreMetodoPago($idMetodoPago)
	{
		$sql = mysql_query("SELECT detalle FROM MetodoPago WHERE idMetodoPago = '".$idMetodoPago."'");
		$col = mysql_fetch_array($sql);
		return $col['detalle'];
	}
	public function EvidenciaPago($idPedido)
	{
		$sql = mysql_query("SELECT EvidenciaPago.img FROM EvidenciaPago inner join rel_Pedido_EvidenciaPago on EvidenciaPago.idEvidenciaPago = rel_Pedido_EvidenciaPago.idEvidenciaPago WHERE rel_Pedido_EvidenciaPago.idPedido = '".$idPedido."'");
		$col = mysql_fetch_array($sql);
		return $col['img'];
	}
	public function nombreEstado($idPedido)
	{
		$sql = mysql_query("SELECT detalle FROM EstadoPedido WHERE idEstadoPedido = '".$this->obtenerAtributo($idPedido)['idEstadoPedido']."'");
		$col = mysql_fetch_array($sql);
		return $col['detalle'];
	}
	public function nombreMetodoEnvio($idMetodoEnvio)
	{
		$sql = mysql_query("SELECT detalle FROM MetodoEnvio WHERE idMetodoEnvio = '".$idMetodoEnvio."'");
		$col = mysql_fetch_array($sql);
		return $col['detalle'];
	}
	
	public function obtenerPedidos()
	{
		$auxReturn = array();
		$sql = mysql_query("SELECT * FROM Pedido ORDER BY idPedido DESC");
		while($col = mysql_fetch_array($sql))
		{
			array_push($auxReturn,$col['idPedido']);
		}
		return $auxReturn;
	}
	public function obtenerProductos($idPedido)
	{
		$auxReturn = array();
		$sql = mysql_query("SELECT * FROM rel_Pedido_Producto WHERE idPedido = '".$idPedido."'");
		while($col = mysql_fetch_array($sql))
		{
			$aux = array();
			$aux['idProducto'] = $col['idProducto'];
			$aux['Cantidad'] = $col['Cantidad'];
			$aux['SKU'] = $col['SKU'];
			array_push($auxReturn,$aux);
		}
		return $auxReturn;
	}
	public function DatosPersonalesComprador($idPedido)
	{
		$Usuarios = new usuarios();
		$auxReturn=array();
		if($GLOBALS['Configuracion']['SistemaUsuarios'] == 1)
		{
			$idUsuarios = $this->obtenerAtributo($idPedido)['idUsuarios'];
			$sql = mysql_query("SELECT * FROM UsuariosInformacion WHERE idTipoDescripcion_campo NOT IN (2) AND LOWER(detalle) NOT IN ('contrasena','contraseña') ORDER BY idTipoDescripcion_campo ASC");
			while($col = mysql_fetch_array($sql))
			{
				$auxReturn[$col['detalle']] = $Usuarios->obtenerInformacion($col['detalle'],$idUsuarios);
			}
		}
		else
		{
			$sql = mysql_query("SELECT * FROM DatosComprador WHERE idPedido = '".$idPedido."'");
				$col = mysql_fetch_array($sql);
				$auxReturn['Nombre'] = $col['Nombre'];
				$auxReturn['Telefono'] = $col['Telefono'];
				$auxReturn['Direccion'] = $col['Direccion'];
				$auxReturn['Rut'] = $col['Rut'];
				$auxReturn['Email'] = $col['Email'];
				$auxReturn['Comentarios'] = $col['Comentarios'];
		}
		return $auxReturn;
	}
	public function obtenerAtributo($idPedido)
	{
		$sql = mysql_query("SELECT * FROM Pedido WHERE idPedido = '".$idPedido."'");
		return mysql_fetch_array($sql);
	}
	public function generarOrdenCompra()
	{
		$rand = rand(111,999);
		return date("Y").date("m").date("d").date("H").date("i").date("s").$rand;
	}
	public function EstaPagado($idPedido)
	{
		$sql = mysql_query("SELECT * FROM WebpayTransacciones inner join Pedido on WebpayTransacciones.idOrdenCompra = Pedido.NumeroOrden
			WHERE WebpayTransacciones.estado = '1'
			AND Pedido.idPedido = '".$idPedido."'");
		if(mysql_num_rows($sql)) return true; else return false;
	}
	public function enviar()
	{
		$Carro = new Carro();
		$ordenCompra = $this->generarOrdenCompra();
		$this->guardar($ordenCompra);
		$urlPanel = $GLOBALS['Configuracion']['Dominio'].$GLOBALS['Configuracion']['Ruta'].$GLOBALS['Configuracion']['CarpetaPanel'];
		if($_SESSION['Pedido']['idMetodoPago'] == 4||$_SESSION['Pedido']['idMetodoPago'] == 5) 
		{
			MsjAprob("Hemos recibido su pedido exitosamente. Un ejecutivo se pondrá en contacto con ud.");
			$msj = 'Ha llegado un nuevo pedido, su número es: '.$ordenCompra.', y puede verlo desde '.$urlPanel;
			if($GLOBALS['Configuracion']['Debug'] == 0) mail($GLOBALS['Informacion']['Email'],'Nuevo pedido #'.$ordenCompra,$msj,"MMW");
			$Carro->destruir();
			$this->destruir();
		}
		else if($_SESSION['Pedido']['idMetodoPago'] == 6) 
		{
			MsjAprob("Hemos recibido su pedido exitosamente. Ahora debes pagarlo <a target='_blank' href='https://www.webpay.cl/portalpagodirecto/pages/institucion.jsf?idEstablecimiento=20663091'>Pinchando aquí</a> y luego enviar el comprobante a ".$GLOBALS['Informacion']['Email']);
			$msj = 'Ha llegado un nuevo pedido, su número es: '.$ordenCompra.', y puede verlo desde '.$urlPanel;
			if($GLOBALS['Configuracion']['Debug'] == 0) mail($GLOBALS['Informacion']['Email'],'Nuevo pedido #'.$ordenCompra,$msj,"MMW");
			$Carro->destruir();
			$this->destruir();
		}
	}
	public function ZonaEnvio($idCostoEnvio)
	{
		$sql = mysql_query("SELECT * FROM CostoEnvio WHERE idCostoEnvio = '".$idCostoEnvio."'");
		$col = mysql_fetch_array($sql);
		return $col;
	}
	public function guardar($ordenCompra)
	{
		$Carro = new Carro();
		$Producto = new Productos();
		if(mysql_query("INSERT INTO Pedido (`Fecha`,`NumeroOrden`) VALUES ('".ExtraerFechaHoraDB()."','".$ordenCompra."')"))
		{
			$idPedido = mysql_insert_id();
			if(!isset($_SESSION['Pedido']['DatosPersonales']['idUsuarios']))
			{
				mysql_query("INSERT INTO DatosComprador 
				(`Nombre`,`Telefono`,`Direccion`,`Rut`,`Email`,`Comentarios`,`idPedido`)
				VALUES 
				('".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['nombre'])."','".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['telefono'])."','".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['direccion'])."','".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['rut'])."','".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['email'])."','".seguridad_sql($_SESSION['Pedido']['DatosPersonales']['comentarios'])."','".$idPedido."')");
			}
			else
			{
				mysql_query("UPDATE Pedido SET idUsuarios = '".$_SESSION['Pedido']['DatosPersonales']['idUsuarios']."' WHERE NumeroOrden = '".$ordenCompra."'");
			}
			if(strlen($_SESSION['CodigoDescuento']['Codigo'])>0)
			{
				mysql_query("INSERT INTO rel_Pedido_CodigoDescuento (`idPedido`,`idCodigoDescuento`) VALUES ('".$idPedido."','".$Producto->CodigoInformacionPorCodigo($_SESSION['CodigoDescuento']['Codigo'])['idCodigoDescuento']."')");
			}
			if(isset($_SESSION['Pedido']['idEvidenciaPago']))
			{
				mysql_query("INSERT INTO rel_Pedido_EvidenciaPago (`idPedido`,`idEvidenciaPago`) VALUES ('".seguridad_sql($idPedido)."','".seguridad_sql($_SESSION['Pedido']['idEvidenciaPago'])."')");
			}
			mysql_query("UPDATE Pedido SET idMetodoPago = '".$_SESSION['Pedido']['idMetodoPago']."' WHERE NumeroOrden = '".$ordenCompra."'");
			mysql_query("UPDATE Pedido SET idMetodoEnvio = '".$_SESSION['Pedido']['idMetodoEnvio']."' WHERE NumeroOrden = '".$ordenCompra."'");
			if($_SESSION['Pedido']['idCostoEnvio'] > 0) mysql_query("UPDATE Pedido SET idCostoEnvio = '".$_SESSION['Pedido']['idCostoEnvio']."' WHERE NumeroOrden = '".$ordenCompra."'");
			$Producto = new Productos();
			foreach($Carro->obtenerCarro() as $productoCarro)
			{
				$sql2 = mysql_query("SELECT SKU FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".$productoCarro['modelo']."' LIMIT 1");
				$col2 = mysql_fetch_array($sql2);
				$sku = $col2['SKU'];
				$sql = "INSERT INTO 
				rel_Pedido_Producto 
				(`idPedido`,`idProducto`,`Cantidad`";
				if($GLOBALS['Configuracion']['SistemaModelos'] == 1)
				{
					$sql .= ",`SKU`";
				}
				$sql .= ") 
				VALUES 
				('".$idPedido."','".$productoCarro['idProducto']."','".$productoCarro['cantidad']."'";
				if($GLOBALS['Configuracion']['SistemaModelos'] == 1)
				{
					$sql .= ",'".$sku."'";
				}
				$sql.= ")";
				mysql_query($sql);
			}
			return true;
		} else MsjError("Ocurrió un error desconocido");
	}
	public function destruir()
	{
		unset($_SESSION['Pedido']);
	}
	public function nombreEstadoPago($idPedido)
	{
		$sql = mysql_query("SELECT detalle FROM EstadoPago WHERE idEstadoPago = '".$this->obtenerAtributo($idPedido)['idEstadoPago']."'");
		$col = mysql_fetch_array($sql);
		return $col['detalle'];
	}
	public function emailConfirmacion($NumeroOrden)
	{
		$Producto = new Productos();
		$sql = mysql_query("SELECT idPedido FROM Pedido WHERE NumeroOrden = '".$NumeroOrden."'");
		$col = mysql_fetch_array($sql);
		$idPedido = $col['idPedido'];
		$idMetodoPago = $this->obtenerAtributo($idPedido)['idMetodoPago'];
		$Email = $this->DatosPersonalesComprador($idPedido)['Email'];
		$Nombre = $this->DatosPersonalesComprador($idPedido)['Nombre'];
		$formaPago = $this->nombreMetodoPago($this->obtenerAtributo($idPedido)['idMetodoPago']);
		$formaEnvio = $this->nombreMetodoEnvio($this->obtenerAtributo($idPedido)['idMetodoEnvio']);
		$total = 0;
		$headers = "From: " . strip_tags($GLOBALS['Informacion']['Email']) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = '<html><body>';
		$message .= '<div style="width:100%; margin:auto">';
		$message .= '<div style="width: 30%;height:35px;padding: 6px;float:left;box-sizing: border-box;text-align:center;">';
		$message .= '<img src="'.$GLOBALS['Configuracion']['URLLogoEmail'].'" style="height:35px;"alt="'.$GLOBALS['Configuracion']['NombreProyecto'].' - Tienda online" />';
		$message .= '</div>';
		$message .= '<div style="width: 70%;float:right;height: 45px;box-sizing: border-box;padding: 12px;background-color:'.$GLOBALS['Configuracion']['ColorPrimario'].';">';
		$message .= '<span style="font-weight:bold; font-size:14px; color:white;">';
		$message .= $GLOBALS['Configuracion']['NombreProyecto'].' - Tienda online';
		$message .= '</span>';
		$message .= '</div>';
		$message .= '<div style="clear:both"></div>';
		$message .= '<div style="padding:60px 15px; clear:both; color:#666">';
		if($idMetodoPago == 1||$idMetodoPago == 2||$idMetodoPago == 3) $message .= 'Hola '.$Nombre.', muchas gracias por tu compra! Hemos recibido el pago exitosamente y prepararemos tu pedido para enviarlo en un plazo menor a 36 horas hábiles. Tu número de pedido es <strong>'.$NumeroOrden.'</strong>.';
		if($idMetodoPago == 4||$idMetodoPago == 5) $message .= 'Hola '.$Nombre.', muchas gracias por tu pedido! Hemos recibido la orden y nos pondremos en contacto contigo para acordar el pago y entrega según corresponda. Tu número de pedido es <strong>'.$NumeroOrden.'</strong>.';
		$message .= '<ul>';
		$message .= '<li>Forma de pago: '.$formaPago.'</li>';
		$message .= '<li>Forma de envío: '.$formaEnvio.'</li>';
		$message .= '</ul>';
		$message .= '</div>';
		$message .= '<table rules="all" style="border-color: '.$GLOBALS['Configuracion']['ColorPrimario'].'; width:100%; border:1px solid '.$GLOBALS['Configuracion']['ColorPrimario'].'" cellpadding="20">';
		$message .= '<thead>';
		$message .= "<tr style='background: ".$GLOBALS['Configuracion']['ColorPrimario'].";'>";
		$message .= "<td width='50%'>";
		$message .= "<strong style='color:white'>Producto</strong>";
		$message .= "</td>";
		$message .= "<td width='20%'>";
		$message .= "<strong style='color:white'>Precio/un</strong>";
		$message .= "</td>";
		$message .= "<td width='10%'>";
		$message .= "<strong style='color:white'>Cantidad</strong>";
		$message .= "</td>";
		$message .= "<td width='20%'>";
		$message .= "<strong style='color:white'>Subtotal</strong>";
		$message .= "</td>";
		$message .= "</tr>";
		$message .= '</thead>';
		$message .= '<tbody style="color:#666">';
		foreach($this->obtenerProductos($idPedido) as $Item)
		{
			$idProducto = $Item['idProducto'];
			$cantidad = $Item['Cantidad'];
			$valorProducto = $Producto->precioFinal($idProducto,NULL);
			$subtotal = $cantidad*$valorProducto;
			$nombre = $Producto->obtenerInformacion($idProducto)['Nombre'];
			$total += $subtotal;
			$message .= "<tr>";
			$message .= "<td width='50%; color:#666!important'>";
			$message .= $nombre;
			$message .= "</td>";
			$message .= "<td width='20%; color:#666'>";
			$message .= formatoMoneda($valorProducto);
			$message .= "</td>";
			$message .= "<td width='10%; color:#666'>";
			$message .= $cantidad;
			$message .= "</td>";
			$message .= "<td width='20%; color:#666'>";
			$message .= formatoMoneda($subtotal);
			$message .= "</td>";
			$message .= "</tr>";
		}
		$message .= "<tr>";
			$message .= '<td width="50%"></td><td width="20%"></td><td width="10%"></td>';
			$message .= "<td width='20%;' align='right;'>";
			$message .= '<strong>Total</strong>: '.formatoMoneda($total);
			$message .= "</td>";
			$message .= "</tr>";
		$message .= '</tbody>';
		$message .= "</table>";
		$message .= "</div>";
		$message .= "</body></html>";

		if($idMetodoPago == 1||$idMetodoPago == 2||$idMetodoPago == 3) mail($Email,'Confirmación de tu compra en '.$GLOBALS['Configuracion']['NombreProyecto'].', #'.$NumeroOrden,$message,$headers);
		if($idMetodoPago == 4||$idMetodoPago == 5) mail($Email,'Confirmación de tu pedido en '.$GLOBALS['Configuracion']['NombreProyecto'].', #'.$NumeroOrden,$message,$headers);
	}
	public function emailConfirmacionAdmin($NumeroOrden)
	{
		$Producto = new Productos();
		$sql = mysql_query("SELECT idPedido FROM Pedido WHERE NumeroOrden = '".$NumeroOrden."'");
		$col = mysql_fetch_array($sql);
		$idPedido = $col['idPedido'];
		$idMetodoPago = $this->obtenerAtributo($idPedido)['idMetodoPago'];
		$Email = $this->DatosPersonalesComprador($idPedido)['Email'];
		$Nombre = $this->DatosPersonalesComprador($idPedido)['Nombre'];
		$formaPago = $this->nombreMetodoPago($this->obtenerAtributo($idPedido)['idMetodoPago']);
		$formaEnvio = $this->nombreMetodoEnvio($this->obtenerAtributo($idPedido)['idMetodoEnvio']);
		$total = 0;
		$headers = "From: " . strip_tags($GLOBALS['Informacion']['Email']) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$message = '<html><body>';
		$message .= '<div style="width:100%; margin:auto">';
		$message .= '<div style="width: 30%;height:35px;padding: 6px;float:left;box-sizing: border-box;text-align:center;">';
		$message .= '<img src="'.$GLOBALS['Configuracion']['URLLogoEmail'].'" style="height:35px;"alt="'.$GLOBALS['Configuracion']['NombreProyecto'].' - Tienda online" />';
		$message .= '</div>';
		$message .= '<div style="width: 70%;float:right;height: 45px;box-sizing: border-box;padding: 12px;background-color:'.$GLOBALS['Configuracion']['ColorPrimario'].';">';
		$message .= '<span style="font-weight:bold; font-size:14px; color:white;">';
		$message .= $GLOBALS['Configuracion']['NombreProyecto'].' - Tienda online';
		$message .= '</span>';
		$message .= '</div>';
		$message .= '<div style="clear:both"></div>';
		$message .= '<div style="padding:60px 15px; clear:both; color:#666">';
		if($idMetodoPago == 1||$idMetodoPago == 2||$idMetodoPago == 3) $message .= 'Hemos recibido una nueva compra, el pago está confirmado.';
		if($idMetodoPago == 4||$idMetodoPago == 5) $message .= 'Hemos recibido un nuevo pedido, el pago no está confirmado aún.';
		$message .= '<ul>';
		$message .= '<li>Forma de pago: '.$formaPago.'</li>';
		$message .= '<li>Forma de envío: '.$formaEnvio.'</li>';
		$message .= '<li>Orden de compra: '.$NumeroOrden.'</li>';
		$message .= '<li>Nombre de comprador: '.$Nombre.'</li>';
		$message .= '</ul>';
		$message .= '</div>';
		$message .= '<table rules="all" style="border-color: '.$GLOBALS['Configuracion']['ColorPrimario'].'; width:100%; border:1px solid '.$GLOBALS['Configuracion']['ColorPrimario'].'" cellpadding="20">';
		$message .= '<thead>';
		$message .= "<tr style='background: ".$GLOBALS['Configuracion']['ColorPrimario'].";'>";
		$message .= "<td width='50%'>";
		$message .= "<strong style='color:white'>Producto</strong>";
		$message .= "</td>";
		$message .= "<td width='20%'>";
		$message .= "<strong style='color:white'>Precio/un</strong>";
		$message .= "</td>";
		$message .= "<td width='10%'>";
		$message .= "<strong style='color:white'>Cantidad</strong>";
		$message .= "</td>";
		$message .= "<td width='20%'>";
		$message .= "<strong style='color:white'>Subtotal</strong>";
		$message .= "</td>";
		$message .= "</tr>";
		$message .= '</thead>';
		$message .= '<tbody style="color:#666">';
		foreach($this->obtenerProductos($idPedido) as $Item)
		{
			$idProducto = $Item['idProducto'];
			$cantidad = $Item['Cantidad'];
			$valorProducto = $Producto->precioFinal($idProducto,NULL);
			$subtotal = $cantidad*$valorProducto;
			$nombre = $Producto->obtenerInformacion($idProducto)['Nombre'];
			$total += $subtotal;
			$message .= "<tr>";
			$message .= "<td width='50%; color:#666!important'>";
			$message .= $nombre;
			$message .= "</td>";
			$message .= "<td width='20%; color:#666'>";
			$message .= formatoMoneda($valorProducto);
			$message .= "</td>";
			$message .= "<td width='10%; color:#666'>";
			$message .= $cantidad;
			$message .= "</td>";
			$message .= "<td width='20%; color:#666'>";
			$message .= formatoMoneda($subtotal);
			$message .= "</td>";
			$message .= "</tr>";
		}
		$message .= "<tr>";
			$message .= '<td width="50%"></td><td width="20%"></td><td width="10%"></td>';
			$message .= "<td width='20%;' align='right;'>";
			$message .= '<strong>Total</strong>: '.formatoMoneda($total);
			$message .= "</td>";
			$message .= "</tr>";
		$message .= '</tbody>';
		$message .= "</table>";
		$message .= "</div>";
		$message .= "</body></html>";

		if($idMetodoPago == 1||$idMetodoPago == 2||$idMetodoPago == 3) {  mail($GLOBALS['Informacion']['Email'],'Nueva compra en '.$GLOBALS['Configuracion']['NombreProyecto'].', #'.$NumeroOrden,$message,$headers); }
		if($idMetodoPago == 4||$idMetodoPago == 5) { mail($GLOBALS['Informacion']['Email'],'Nuevo pedido en '.$GLOBALS['Configuracion']['NombreProyecto'].', #'.$NumeroOrden,$message,$headers); }
	}
}
?>