<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("DELETE FROM AlbumFoto WHERE idAlbumFoto = '".seguridad_sql($_POST['idAlbumFoto'])."'");
	
?>