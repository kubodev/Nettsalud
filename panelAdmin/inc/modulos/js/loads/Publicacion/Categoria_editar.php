<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	if($_FILES['img'][ 'name'])
	{
		if(esImagen($_FILES['img'][ 'name']))
		{
			$dir=explode('inc',dirname(__FILE__));
			$destino = $dir[0].'img';
			$nombreFoto = cadenatexto(12); // Genera string aleatoriamente
			move_uploaded_file($_FILES['img']['tmp_name'],$destino . '/' .$nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]));
			$archivoFoto = $nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]);
			mysql_query("UPDATE PublicacionCategoria SET img = '".seguridad_sql($archivoFoto)."' WHERE idPublicacionCategoria = '".seguridad_sql($_POST['idPublicacionCategoria'])."'");
		} else { MsjError("Debes subir una imagen"); break; }
	}
	if(mysql_query("UPDATE PublicacionCategoria SET Nombre = '".seguridad_sql($_POST['Nombre'])."' WHERE idPublicacionCategoria = '".seguridad_sql($_POST['idPublicacionCategoria'])."'")) 
	{
		MsjAprob("Categoría editada exitosamente"); 
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			{
				mysql_query("UPDATE PublicacionCategoria SET Nombre_".$idiomas[$posicion]." = '".seguridad_sql($_POST['Nombre_'.$col2['idPublicacionCategoria'].'_'.$idiomas[$posicion]])."' WHERE idPublicacionCategoria = '".seguridad_sql($_POST['idPublicacionCategoria'])."'");
			}
		}
	} else MsjError("Ocurrió un error");

?>