<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");

	$Carro = new Carro();

	if($Carro->agregarProducto($_POST['idProducto'],$_POST['cantidad'],$_POST['idrel_Es_Es'])&&$_POST['cantidad']>0) {} else MsjError("Ocurrió un error");

?>