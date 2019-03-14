<?php
$dir=explode('inc',dirname(__FILE__));
require_once($dir[0]."inc/controlador.php");

			$idUsuarios = $_SESSION['idUsuarios'];

			mysql_query("UPDATE Usuarios SET idMascota = '".seguridad_sql($_POST['idMascota'])."' WHERE idUsuarios = '".$idUsuarios."'");
			/* Subida Campos de Informacion */
				$sql = mysql_query("SELECT * FROM UsuariosInformacion ORDER BY idTipoDescripcion_campo ASC");
				while($col = mysql_fetch_array($sql))
				{
					if($col['idTipoDescripcion_campo'] != 2&&$col['idTipoDescripcion_campo'] != 5) 
					mysql_query("UPDATE rel_Usuarios_UsuariosInformacion SET detalle = '".seguridad_sql($_POST['idUsuariosInformacion'.$col['idUsuariosInformacion']])."' WHERE idUsuariosInformacion = '".$col['idUsuariosInformacion']."' AND idUsuarios = '".$idUsuarios."'");
					
				}
				MsjAprob("Datos actualizados exitosamente");
				/* Fin Subida Campos de Informacion */


?>