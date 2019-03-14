<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("UPDATE Pedido SET idEstadoPago = '".seguridad_sql($_POST['idEstadoPago'])."' WHERE idPedido = '".seguridad_sql($_POST['idPedido'])."'");