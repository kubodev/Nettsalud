<?php 
	require_once("../../inc/controlador.php");
	$idFormularioContacto = $_GET['idFormularioContacto'];
	mysql_query("DELETE FROM rel_FormularioContacto_FormularioContactoInformacion WHERE idFormularioContacto = '".seguridad_sql($idFormularioContacto)."'");
	mysql_query("DELETE FROM FormularioContacto WHERE idFormularioContacto = '".seguridad_sql($idFormularioContacto)."'");
	redirect("../");
?>
