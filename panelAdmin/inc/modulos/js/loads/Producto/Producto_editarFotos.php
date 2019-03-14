<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$idProducto = $_POST['idProducto'];
	//////////////////////////////////////// Actualizar fotos ///////////////////////////////////////////////////
		for($idFoto=1; $idFoto<=$_POST['envimg']; $idFoto++) // Fotos existentes
		{
			if($_FILES [ 'img'.$idFoto ][ 'size' ] > 0)
			{
				$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente


				$tamano = $_FILES [ 'img'.$idFoto ][ 'size' ];

				$dir=explode('inc',dirname(__FILE__));
				$destino = $dir[0].'img/Productos' ;  


				if(esImagen($_FILES ['img'.$idFoto ][ 'name' ]))


				{ 


					move_uploaded_file($_FILES [ 'img'.$idFoto ][ 'tmp_name' ],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['img'.$idFoto ][ 'name' ]));


					mysql_query("UPDATE ProductoFoto SET NombreArchivo = '".$nombreArchivo.'.'.extensionArchivo($_FILES ['img'.$idFoto ][ 'name' ])."' WHERE idProductoFoto = '".$idFoto."'");


				} else MsjError("La imagen tiene un formato incorrecto");
			}
		}
		for($idFoto=1; $idFoto<=$_POST['fotosNuevas']; $idFoto++)
		{
			if($_FILES [ 'img_nueva'.$idFoto ][ 'size' ] > 0)
			{
				$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente


				$tamano = $_FILES [ 'img_nueva'.$idFoto ][ 'size' ];

				$dir=explode('inc',dirname(__FILE__));
				$destino = $dir[0].'img/Productos' ;  


				if(esImagen($_FILES ['img_nueva'.$idFoto ][ 'name' ]))


				{ 


					move_uploaded_file($_FILES [ 'img_nueva'.$idFoto ][ 'tmp_name' ],$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES ['img_nueva'.$idFoto ][ 'name' ]));

					mysql_query("INSERT INTO ProductoFoto (`NombreArchivo`,`idProducto`) VALUES ('".$nombreArchivo.'.'.extensionArchivo($_FILES ['img_nueva'.$idFoto ][ 'name' ])."','".seguridad_sql($idProducto)."')");


				} else MsjError("La imagen tiene un formato incorrecto");
			}
		}

?>