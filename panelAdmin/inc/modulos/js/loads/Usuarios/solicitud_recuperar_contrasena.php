<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	// GENERA CONTRASEÑA
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!"#$%&/()=';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	};

	$contrasena=generateRandomString();
	$contrasena_encrypt=md5(generateRandomString());
	$email=seguridad_sql($_POST['email']);

	$sql=mysql_query("SELECT * FROM UsuariosRecuperarPassw WHERE Usuario='$email' and venc='0'");
	if(mysql_num_rows($sql)){
		echo msjError("Ya existe una solicitud pendiente para ese Email");
	}else{
		mysql_query("INSERT INTO UsuariosRecuperarPassw (Usuario, cod, venc) VALUES ('$email','$contrasena_encrypt', '0')");
		$header = 'From: no-responder@'.$Configuracion['DominioBruto']." \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";
		$mensaje = "Estimado:"."\r\n\n";
		$mensaje .= "para recuperar su contraseña ingrese al siguiente enlace:"." \r\n".$Configuracion['Dominio'].$Configuracion['Ruta'].$Configuracion['RutaRecuperarPassw']."/?cod=".$contrasena_encrypt;
		$para = $email;
		$asunto = "Recuperar: su contraseña en ".$Configuracion['NombreProyecto'];
		mail($para, $asunto, utf8_decode($mensaje), $header);
		echo MsjAprob("Se ha creado una solicitud, revise su email");
	}
?>