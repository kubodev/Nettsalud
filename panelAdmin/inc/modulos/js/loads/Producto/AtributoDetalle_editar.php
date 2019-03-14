<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	$sql = "UPDATE ProductoAtributoDetalle SET detalle = '".seguridad_sql($_POST['nombre'])."' WHERE idProductoAtributoDetalle = '".seguridad_sql($_POST['idProductoAtributoDetalle'])."'";
	if(mysql_query($sql)) MsjAprob("Detalle de atributo editado exitosamente"); else MsjError("Ocurrió un error");

?>