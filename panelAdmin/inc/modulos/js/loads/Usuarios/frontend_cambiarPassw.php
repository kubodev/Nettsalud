<?php
$dir=explode('inc',dirname(__FILE__));
require_once($dir[0]."inc/controlador.php");

			$idUsuarios = $_SESSION['idUsuarios'];

			/* Subida Campos de Informacion */
				$sql = mysql_query("SELECT * FROM UsuariosInformacion ORDER BY idTipoDescripcion_campo ASC");
				while($col = mysql_fetch_array($sql))
				{
					if($col['idTipoDescripcion_campo']==7) // Actualizar contraseña
					{ 
						if(strlen($_POST['contrasena_nueva']))
							mysql_query("UPDATE rel_Usuarios_UsuariosInformacion SET detalle = '".md5(seguridad_sql($_POST['contrasena_nueva']))."' WHERE idUsuariosInformacion = '".$col['idUsuariosInformacion']."' AND idUsuarios = '".$idUsuarios."'");
					}
					
					
				}
				MsjAprob("Datos actualizados exitosamente");
				/* Fin Subida Campos de Informacion */


?>