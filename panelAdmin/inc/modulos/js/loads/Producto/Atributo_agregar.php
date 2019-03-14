<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	$sql = "INSERT INTO ProductoAtributo (`detalle`) VALUES ('".seguridad_sql($_POST['nombre'])."')";
	if(mysql_query($sql)) MsjAprob("Atributo creado exitosamente, ahora debe asignarle detalles de atributo"); else MsjError("Ocurrió un error");

?>