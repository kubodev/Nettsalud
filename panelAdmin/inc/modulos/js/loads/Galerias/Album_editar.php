<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	if(mysql_query("UPDATE Album SET Nombre = '".seguridad_sql($_POST['Nombre'])."' WHERE idAlbum = '".seguridad_sql($_POST['idAlbum'])."'")) 
	{
		MsjAprob("Album editado exitosamente"); 
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			{
				mysql_query("UPDATE Album SET Nombre_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Nombre_'.$col2['idAlbum'].'_'.$idiomas[$posicion]])."' WHERE idAlbum = '".seguridad_sql($_POST['idAlbum'])."'");
			}
		}
	} else MsjError("Ocurrió un error");

?>