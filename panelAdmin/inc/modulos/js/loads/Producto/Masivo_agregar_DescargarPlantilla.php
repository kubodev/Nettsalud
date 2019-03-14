<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$Producto->GenerarExcelAgregarProductos();

?>