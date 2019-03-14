<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$idCostoEnvio = $_POST['idCostoEnvio'];
	$_SESSION['Pedido']['idCostoEnvio'] = $idCostoEnvio;


?>