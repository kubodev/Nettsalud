<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$idProductoMarca = $_POST['idProductoMarca'];
	if($_FILES['img'][ 'name'])
	{
		if(esImagen($_FILES['img'][ 'name']))
		{
			$dir=explode('inc',dirname(__FILE__));
			$destino = $dir[0].'img/Productos';
			$nombreFoto = cadenatexto(12); // Genera string aleatoriamente
			move_uploaded_file($_FILES['img']['tmp_name'],$destino . '/' .$nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]));
			$archivoFoto = $nombreFoto.'.'.extensionArchivo($_FILES['img']['name' ]);
			mysql_query("UPDATE ProductoMarca SET img = '".seguridad_sql($archivoFoto)."' WHERE idProductoMarca = '".$idProductoMarca."'");
		} else { MsjError("Debes subir una imagen"); break; }
	}
	$sql = "UPDATE ProductoMarca 
	SET nombre = '".seguridad_sql($_POST['nombre'])."'
	WHERE idProductoMarca = '".$idProductoMarca."'";
	if(mysql_query($sql)) MsjAprob("Marca editada exitosamente"); else MsjError("Ocurrió un error");

?>