<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	if($_FILES['img'][ 'name'])
	{
		if(esImagen($_FILES['img'][ 'name']))
		{
			$dir=explode('inc',dirname(__FILE__));
			$destino = $dir[0].'img/Productos';
			$nombreFoto = cadenatexto(12); // Genera string aleatoriamente
			move_uploaded_file($_FILES['img']['tmp_name'],$destino . '/' .$nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]));
			$archivoFoto = $nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]);
		} else { MsjError("Debes subir una imagen"); break; }
	}
	$sql = "INSERT INTO ProductoCategoria (`nombre`,`descripcion`,`img`,`orden`) VALUES ('".seguridad_sql($_POST['nombre'])."','".seguridad_sql($_POST['descripcion'])."','".seguridad_sql($archivoFoto)."','".seguridad_sql($_POST['orden'])."')";
	if(mysql_query($sql)) MsjAprob("Categoría creada exitosamente"); else MsjError("Ocurrió un error");
	$idProductoCategoria = mysql_insert_id();
	if($_POST['categoriaPadre'] > 0)
	{
		mysql_query("INSERT INTO rel_ProductoCategoria_ProductoCategoria (`idProductoCategoria_Padre`,`idProductoCategoria_Hijo`) VALUES ('".seguridad_sql($_POST['categoriaPadre'])."','".$idProductoCategoria."')");
	}
	$NombreProducto = limpiarurl(trim(substr(str_replace(' ', '-', strtolower($_POST['nombre'])),0,50)));
	mysql_query("UPDATE ProductoCategoria SET URL = '".seguridad_sql($NombreProducto)."' WHERE idProductoCategoria = '".$idProductoCategoria."'");

?>