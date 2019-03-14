<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	$email=seguridad_sql($_POST['email']);
	$contrasena=seguridad_sql($_POST['contrasena']);
	$contrasena_validar=seguridad_sql($_POST['contrasena_validar']);
	$cod=seguridad_sql($_POST['cod']);

	$sql=mysql_query("SELECT * from rel_Usuarios_UsuariosInformacion where idUsuariosInformacion='6' and detalle='$email'");
	if(mysql_num_rows($sql)){
		while($col=mysql_fetch_array($sql)){
			$idUsuarios=$col['idUsuarios'];
		};
	};

	if($contrasena == $contrasena_validar){
		$contrasena_encrypt=md5($contrasena);
		$sql2=mysql_query("SELECT * from rel_Usuarios_UsuariosInformacion WHERE idUsuarios='$idUsuarios' and detalle='$contrasena_encrypt'");
		if(mysql_num_rows($sql2)){
			echo MsjError("Ingrese una contraseña distinta");
		}else{
			mysql_query("UPDATE rel_Usuarios_UsuariosInformacion SET detalle='$contrasena_encrypt' WHERE idUsuariosInformacion='8' and idUsuarios=$idUsuarios");
			mysql_query("UPDATE UsuariosRecuperarPassw SET venc='1' WHERE cod='$cod'");
			$Usuarios->login($idUsuarios);
			redirect($Configuracion['Ruta'].$Configuracion['RutaPerfilUsuario']);
		}
	}else{
		echo MsjError("Las contraseñas no corresponden");
	}
?>