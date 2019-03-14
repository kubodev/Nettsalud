<?php
if(@$_POST['enviar'] == "Enviar")
{
	mysql_query("UPDATE Publicacion SET idPublicacionCategoria = '".seguridad_sql($_POST['idPublicacionCategoria'])."' WHERE idPublicacion = '".$idPublicacion."'");
	mysql_query("UPDATE Publicacion SET Titulo = '".seguridad_sql($_POST['Titulo'])."' WHERE idPublicacion = '".$idPublicacion."'");
	mysql_query("UPDATE Publicacion SET Texto = '".seguridad_sql($_POST['Texto'])."' WHERE idPublicacion = '".$idPublicacion."'");			
	if(count($idiomas) > 1) // Sistema de idiomas
	{
		for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
		{
			mysql_query("UPDATE Publicacion SET Titulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Titulo_'.$idiomas[$posicion]])."' WHERE idPublicacion = '".$idPublicacion."'");
			mysql_query("UPDATE Publicacion SET Texto_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Texto_'.$idiomas[$posicion]])."' WHERE idPublicacion = '".$idPublicacion."'");
		}
	}
	if($_FILES ['NombreArchivo'][ 'size' ])
	{
		$nombreArchivo = cadenatexto(12); 
		$dirimg=explode('panelAdmin',dirname(__FILE__));
				$destino = $dirimg[0].'img' ; 
		if(esImagen($_FILES ['NombreArchivo'][ 'name' ]))
		{ 
			move_uploaded_file($_FILES [ 'NombreArchivo' ][ 'tmp_name' ],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['NombreArchivo'][ 'name' ]));
			mysql_query("UPDATE Publicacion SET NombreArchivo = '".seguridad_sql($nombreArchivo.'.'.extensionArchivo($_FILES ['NombreArchivo'][ 'name' ]))."' WHERE idPublicacion = '".$idPublicacion."'");
		}
	}
	MsjAprob("Publicación editada exitosamente");
}