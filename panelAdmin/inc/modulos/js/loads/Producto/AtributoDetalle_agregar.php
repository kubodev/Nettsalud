<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	$sql = "INSERT INTO ProductoAtributoDetalle (`idProductoAtributo`,`detalle`) VALUES ('".seguridad_sql($_POST['idProductoAtributo'])."','".seguridad_sql($_POST['nombre'])."')";
	if(mysql_query($sql)) MsjAprob("Detalle de atributo creado exitosamente"); else MsjError("Ocurrió un error");

?>