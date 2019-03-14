<?php
	ini_set('post_max_size','1024M');
	ini_set('upload_max_filesize','1024M');
	ini_set('max_input_vars','100');
	$dir=explode('inc',dirname(__FILE__));

	require_once($dir[0]."inc/controlador.php");


			$num = 0;
			
				$Errores = array();
			
					if($_FILES [ 'fotos'][ 'size' ] > 0)
					{



						$tamano = $_FILES [ 'fotos' ][ 'size' ];
						$dir=explode('inc',dirname(__FILE__));
						$destino = $Configuracion['RutaAbsoluta'].'panelAdmin/img/Productos' ;
						if(esImagen($_FILES ['fotos' ][ 'name' ]))
						{ 
							$nombre = explode('.',$_FILES ['fotos' ][ 'name' ])[0];
							if(strpos($nombre, ' ') === false) 
							{} 
							else 
							{
								$nombre = explode(' ',$nombre)[0];
							}
							if(strpos($nombre, '-') === false) 
							{} 
							else 
							{
								$nombre = explode('-',$nombre)[0];
							}
							$nombre_archivo = limpiarurl(str_replace(' ','_',$_FILES ['fotos' ][ 'name' ]));
							$nombre_archivo = limpiarurl(str_replace('-','_',$_FILES ['fotos' ][ 'name' ]));
							$sql = mysql_query("SELECT * FROM rel_ProductoInformacion_Producto inner join ProductoInformacion on ProductoInformacion.idProductoInformacion = rel_ProductoInformacion_Producto.idProductoInformacion WHERE ProductoInformacion.detalle = 'SKU' AND rel_ProductoInformacion_Producto.detalle = '".$nombre."'");
							if(mysql_num_rows($sql))
							{
								$col = mysql_fetch_array($sql);
								$idProducto = $col['idProducto'];


								$fn = $_FILES['fotos']['tmp_name'];
								$size = getimagesize($fn);
								$ratio = $size[0]/$size[1]; // width/height
								if( $ratio > 1) {
								    $width = 900;
								    $height = 900/$ratio;
								}
								else {
								    $width = 900*$ratio;
								    $height = 900;
								}
								$src = imagecreatefromstring(file_get_contents($fn));
								$dst = imagecreatetruecolor($width,$height);
								imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
								imagedestroy($src);
								imagepng($dst,$destino. '/' .$nombre_archivo); // adjust format as needed
								imagedestroy($dst);

								//	move_uploaded_file($_FILES [ 'fotos' ][ 'tmp_name' ],$destino . '/' .$nuevo_nombre);
									mysql_query("INSERT INTO ProductoFoto (`NombreArchivo`,`idProducto`) VALUES ('".$nombre_archivo."','".$idProducto."')");
									$num++;
							 } else $Errores[$_FILES ['fotos' ][ 'name' ]] = 'No se encuentra el SKU '.$nombre;
						} else $Errores[$_FILES ['fotos' ][ 'name' ]] = 'El formato debe ser png o jpg';
					}
				
				if(count($Errores))
				{
					foreach($Errores as $Key => $Valor)
					{
						MsjError("Error en la foto ".$Key.": ".$Valor);
					}
				}
			
			?>