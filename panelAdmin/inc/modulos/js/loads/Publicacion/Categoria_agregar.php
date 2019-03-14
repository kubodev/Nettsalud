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
		} else { MsjError("Debes subir una imagen"); break; }
	}
	if(mysql_query("INSERT INTO PublicacionCategoria (`Nombre`,`img`) VALUES ('".seguridad_sql($_POST['Nombre'])."','".seguridad_sql($archivoFoto)."')")) MsjAprob("Categoría creada exitosamente"); else MsjError("Ocurrió un error");

?>