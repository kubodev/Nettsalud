<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("UPDATE Pedido SET idEstadoPedido = '".seguridad_sql($_POST['idEstadoPedido'])."' WHERE idPedido = '".seguridad_sql($_POST['idPedido'])."'");