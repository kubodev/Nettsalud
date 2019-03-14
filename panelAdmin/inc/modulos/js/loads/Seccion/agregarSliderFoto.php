<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$sql = mysql_query("SELECT * FROM SliderFoto WHERE idSeccion = '".seguridad_sql($_POST['idSeccion'])."' ORDER BY idSliderFoto DESC LIMIT 1");
	$col = mysql_fetch_array($sql);
	if(mysql_query("INSERT INTO SliderFoto (`idSeccion`,`TieneTitulo`,`TieneTexto`,`TieneBotonTitulo`,`TieneBotonUrl`) VALUES ('".$col['idSeccion']."','".$col['TieneTitulo']."','".$col['TieneTexto']."','".$col['TieneBotonTitulo']."','".$col['TieneBotonUrl']."')"))
	{
		$idSliderFoto = mysql_insert_id();
		$dir=explode('inc',dirname(__FILE__));
		require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-vistaItemSlider.php");
	} else MsjError("Error desconocido");

?>