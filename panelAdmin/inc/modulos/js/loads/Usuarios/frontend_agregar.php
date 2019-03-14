<?php
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php"); 
	$sql = mysql_query("SELECT rel_Usuarios_UsuariosInformacion.detalle FROM Usuarios inner join rel_Usuarios_UsuariosInformacion on rel_Usuarios_UsuariosInformacion.idUsuarios = Usuarios.idUsuarios WHERE rel_Usuarios_UsuariosInformacion.idUsuariosInformacion = '6' AND rel_Usuarios_UsuariosInformacion.detalle = '".seguridad_sql($_POST['idUsuariosInformacion6'])."'");
	if(mysql_num_rows($sql)==0)
	{
		if(mysql_query("INSERT INTO Usuarios (`fechaRegistro`)
			VALUES
			('".ExtraerFechaHoraDB()."')"))
		{
			$idUsuarios = mysql_insert_id();
			/* Subida Campos de Informacion */
				$sql = mysql_query("SELECT * FROM UsuariosInformacion ORDER BY idTipoDescripcion_campo ASC");
				while($col = mysql_fetch_array($sql))
				{
					if($col['idTipoDescripcion_campo'] == 7) // Contraseña
						mysql_query("INSERT INTO rel_Usuarios_UsuariosInformacion (`detalle`,`idUsuariosInformacion`,`idUsuarios`) VALUES('".md5($_POST['idUsuariosInformacion'.$col['idUsuariosInformacion']])."','".$col['idUsuariosInformacion']."','".$idUsuarios."')");
					else if($col['idTipoDescripcion_campo'] != 2) 
						mysql_query("INSERT INTO rel_Usuarios_UsuariosInformacion (`detalle`,`idUsuariosInformacion`,`idUsuarios`) VALUES('".seguridad_sql($_POST['idUsuariosInformacion'.$col['idUsuariosInformacion']])."','".$col['idUsuariosInformacion']."','".$idUsuarios."')");
					
				}
				mysql_query("INSERT INTO rel_Usuarios_UsuariosInformacion (`detalle`,`idUsuariosInformacion`,`idUsuarios`) VALUES('imgPerfil.png','5','".$idUsuarios."')");
				/* Fin Subida Campos de Informacion */
				/* Se verifica si viene de 'Publicar' */
				$Usuarios->login($idUsuarios);
				
				if(!isset($noredirect))
				{
					MsjAprob("Acabas de registrarte exitosamente, ya puedes seguir viendo productos o pedir");
					
					redirect($Configuracion['Ruta'].$Configuracion['RutaPerfilUsuario']);
				}
		} else MsjError("Ocurrió un error desconocido");
	} else MsjError("Este email ya está registrado en la base de datos");


?>