<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	if(mysql_query("INSERT INTO Album (`Nombre`,`idSeccion`) VALUES ('".seguridad_sql($_POST['Nombre'])."','".seguridad_sql($_POST['idSeccion'])."')")) MsjAprob("Album creado exitosamente"); else MsjError("Ocurrió un error");

?>