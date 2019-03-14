<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$idProducto = $_POST['idProducto'];
	$idRel_ProductoAtributoDetalle_Producto = $_POST['idrel_Es_Es'];
	if($Configuracion['SistemaModelos'] == 0)
	{

		echo $Producto->obtenerInformacion($idProducto)['Stock'];
	}
	else echo $Producto->stock($idProducto,$idRel_ProductoAtributoDetalle_Producto);