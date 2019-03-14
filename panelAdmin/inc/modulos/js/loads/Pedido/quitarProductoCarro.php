<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$Carro = new Carro();
	$Carro->quitarProducto($_POST['idProducto']);
	redirect("");
	return true;