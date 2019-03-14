<?
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");
if(mysql_query("INSERT INTO FormularioContacto (`Fecha`,`IP`) VALUES ('".ExtraerFechaHoraDB()."','".IP()."')"))
{
	$idFormularioContacto = mysql_insert_id();
	if($Configuracion['Debug'] == 1) $destinatario = 'matias@mmw.cl';
	else $destinatario = $Informacion['Email'];


	$msj = 'Ha llegado un nuevo ticket de contacto, los detalles van a continuación:

';
	/* Subida Campos de Informacion */

	$sql = mysql_query("SELECT * FROM FormularioContactoInformacion ORDER BY idTipoDescripcion_campo ASC");

	while($col = mysql_fetch_array($sql))

	{

		if($col['idTipoDescripcion_campo'] != 2) 
		{
			mysql_query("INSERT INTO rel_FormularioContacto_FormularioContactoInformacion (`detalle`,`idFormularioContactoInformacion`,`idFormularioContacto`) VALUES('".seguridad_sql($_POST['FormularioContactoInformacion'.$col['idFormularioContactoInformacion']])."','".$col['idFormularioContactoInformacion']."','".$idFormularioContacto."')");
			$msj .= $col['detalle'].': '.$_POST['FormularioContactoInformacion'.$col['idFormularioContactoInformacion']].'
';
		}
		else 

		{ // Subida Documentos

			$nombreArchivo = cadenatexto(12); 

			$dir=explode('inc',dirname(__FILE__));

			$destino = $dir[0].'img' ;

			move_uploaded_file($_FILES['FormularioContactoInformacion'.$col['idFormularioContactoInformacion']]['tmp_name'],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES['FormularioContactoInformacion'.$col['idFormularioContactoInformacion']]['name']));

			mysql_query("INSERT INTO rel_FormularioContacto_FormularioContactoInformacion (`detalle`,`idFormularioContactoInformacion`,`idFormularioContacto`) VALUES('".seguridad_sql($nombreArchivo.'.'.extensionArchivo($_FILES['FormularioContactoInformacion'.$col['idFormularioContactoInformacion']]['name']))."','".$col['idFormularioContactoInformacion']."','".$idFormularioContacto."')");

		}

	}

	/* Fin Subida Campos de Informacion */
	mail($destinatario,'Nuevo ticket de contacto',$msj,"From: ".$destinatario." <".$destinatario.">");
	MsjAprob("Gracias por contactarnos");
} else MsjError("Ocurrió un error");

?>