<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");

	foreach($_POST as $clave => $valor)
	{
		$_SESSION['Pedido']['DatosPersonales'][$clave] = $valor;	
	}

?>