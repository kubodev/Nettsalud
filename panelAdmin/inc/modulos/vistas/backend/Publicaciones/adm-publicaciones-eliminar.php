<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("DELETE FROM Publicacion WHERE idPublicacion = '".seguridad_sql($_GET['idPublicacion'])."'");
	redirect("../");
?>