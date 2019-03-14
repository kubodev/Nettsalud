<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$idCodigoDescuento = $_POST['idCodigoDescuento'];
	$sql = "UPDATE CodigoDescuento 
	SET Codigo = '".seguridad_sql($_POST['Codigo'])."',
	Porcentaje = '".seguridad_sql($_POST['Porcentaje'])."',
	MaxUsos = '".seguridad_sql($_POST['MaxUsos'])."',
	Monto = '".seguridad_sql($_POST['Monto'])."'
	WHERE idCodigoDescuento = '".$idCodigoDescuento."'";
	if(mysql_query($sql)) MsjAprob("Codigo editado exitosamente"); else MsjError("Ocurrió un error");
	

?>