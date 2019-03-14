<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	
	$Codigo = rand(111111111,999999999);
	if(is_numeric($_POST['Monto']))
	{
		mysql_query("INSERT INTO CodigoDescuento (`Codigo`,`Monto`,`Habilitado`,`MaxUsos`) VALUES ('".$Codigo."','".seguridad_sql($_POST['Monto'])."','0','1')");
		$DatosComprador['Nombre'] = $_POST['Envia_Nombre'];
		$DatosComprador['Email'] = $_POST['Envia_Email'];
		$DatosReceptor['Nombre'] = $_POST['Recibe_Nombre'];
		$DatosReceptor['Email'] = $_POST['Recibe_Email'];
		$Monto = $_POST['Monto'];
		$MedioPago->giftcard($DatosComprador,$DatosReceptor,$Monto,$Codigo);
	}