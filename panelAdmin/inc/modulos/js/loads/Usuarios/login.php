<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	if($Usuarios->comprobarContrasenaLogin($usuario,$contrasena))
	{
		$idUsuarios = $Usuarios->comprobarContrasenaLogin($usuario,$contrasena);
		$Usuarios->login($idUsuarios);
		if($_POST['redirect']) redirect($_POST['redirect']);
	} else MsjError("La contraseña no es correcta");
?>