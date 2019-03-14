<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$sql = mysql_query("SELECT * FROM Album WHERE idAlbum = '".seguridad_sql($_GET['idAlbum'])."'");
	$col = mysql_fetch_array($sql);
	$sql2 = mysql_query("SELECT * FROM Album WHERE idSeccion = '".seguridad_sql($col['idSeccion'])."'");
	if(mysql_num_rows($sql2)>1)
	{
		mysql_query("DELETE FROM AlbumFoto WHERE idAlbum = '".seguridad_sql($_GET['idAlbum'])."'");
		mysql_query("DELETE FROM Album WHERE idAlbum = '".seguridad_sql($_GET['idAlbum'])."'");
		redirect("../");
	} else MsjError("No puedes eliminar el único album de esta pestaña");
?>