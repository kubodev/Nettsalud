<?php
require_once(dirname(__FILE__)."/../../../controlador.php");

	$Carro = new Carro();
	if($_POST['tipo'] == 1)
	{
		if($Carro->numeroProductos()>0&&$Carro->totalPedido()==0) { return MsjError("No puedes mezclar programas con paquetes o servicios"); break; }
	}
	if($_POST['tipo'] == 2)
	{
		if($Carro->totalPedido()>0) { return MsjError("No puedes mezclar programas con paquetes o servicios"); break; }
	}
	if($Carro->agregarProducto($_POST['idProducto'],$_POST['cantidad'],$_POST['idrel_Es_Es'],$_POST['idTipoReserva'],$_POST['fechaReserva'])) {} else MsjError("Ocurrió un error");

?>