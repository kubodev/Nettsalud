<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("DELETE FROM Elemento WHERE idElemento = '".seguridad_sql($_POST['idElemento'])."'");
	
?>