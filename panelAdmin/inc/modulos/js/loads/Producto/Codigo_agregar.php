<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$sql = "INSERT INTO CodigoDescuento (`Codigo`,`Porcentaje`,`Monto`,`MaxUsos`) VALUES ('".seguridad_sql($_POST['Codigo'])."','".seguridad_sql($_POST['Porcentaje'])."','".seguridad_sql($_POST['Monto'])."','".seguridad_sql($_POST['MaxUsos'])."')";
	if(mysql_query($sql)) MsjAprob("Codigo creado exitosamente"); else MsjError("Ocurrió un error");
	

?>