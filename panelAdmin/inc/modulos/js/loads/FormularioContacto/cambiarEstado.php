<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	mysql_query("UPDATE FormularioContacto SET idEstadoFormularioContacto = '".seguridad_sql($_POST['idEstadoFormularioContacto'])."' WHERE idFormularioContacto = '".seguridad_sql($_POST['idFormularioContacto'])."'");