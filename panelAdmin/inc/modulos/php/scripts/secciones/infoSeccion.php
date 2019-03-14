<?php
if(isset($_POST['infoSeccion'])) //Enviar sección de contenido
{
	mysql_query("UPDATE Seccion SET Titulo = '".seguridad_sql($_POST['Titulo'])."' WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
	if(count($idiomas) > 1) // Sistema de idiomas
	{
		for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
		mysql_query("UPDATE Seccion SET Titulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Titulo_'.$idiomas[$posicion]])."' WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
	}
	mysql_query("UPDATE Seccion SET Texto = '".seguridad_sql($_POST['Texto'])."' WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
	if(count($idiomas) > 1) // Sistema de idiomas
	{
		for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
		mysql_query("UPDATE Seccion SET Texto_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Texto_'.$idiomas[$posicion]])."' WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
	}
	
}
?>