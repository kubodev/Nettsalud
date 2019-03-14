<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("DELETE FROM Publicacion WHERE idPublicacionCategoria = '".seguridad_sql($_GET['idPublicacionCategoria'])."'");
	mysql_query("DELETE FROM PublicacionCategoria WHERE idPublicacionCategoria = '".seguridad_sql($_GET['idPublicacionCategoria'])."'");
	redirect("../");
?>