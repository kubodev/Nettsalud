<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$idProductoAtributo = $_POST['idProductoAtributo'];
	$sql = "UPDATE ProductoAtributo 
	SET detalle = '".seguridad_sql($_POST['nombre'])."'
	WHERE idProductoAtributo = '".$idProductoAtributo."'";
	if(mysql_query($sql)) MsjAprob("Atributo editado exitosamente"); else MsjError("Ocurrió un error");

?>