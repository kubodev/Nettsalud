<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("DELETE FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($_POST['idSliderFoto'])."'");
	
?>