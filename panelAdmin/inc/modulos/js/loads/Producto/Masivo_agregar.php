<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	require_once $dir[0].'inc/modulos/php/phpexcel/PHPExcel/IOFactory.php';
	$Errores = array();
	if(strtolower(extensionArchivo($_FILES['planilla']['name'])) == 'xls' || strtolower(extensionArchivo($_FILES['planilla']['name'])) == 'xlsx')
	{
    
	    try {
	        $inputFileType = PHPExcel_IOFactory::identify($_FILES['planilla']['tmp_name']);
	        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	        $objPHPExcel = $objReader->load($_FILES['planilla']['tmp_name']);
	    } catch(Exception $e) {
	       array_push($Errores, 'Archivo ilegible');
	    }

	    //  Get worksheet dimensions
	    $nHoja = '0';
	    	$sheet = $objPHPExcel->getSheet($nHoja); 
	    	$lastColumn = $sheet->getHighestColumn();
	    	$lastColumn++;
	    	$highestRow = $sheet->getHighestRow(); 
	    $highestColumn = $sheet->getHighestColumn();

	    //  Loop through each row of the worksheet in turn
	    for ($row = 3; $row <= $highestRow; $row++)
	    { 
	        //  Read a row of data into an array
	        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                        NULL,
	                                        TRUE,
	                                        FALSE);
	      
	        if($Configuracion['SistemaModelos'] == 0)
	        {
	        	$arrayPI = array();
	        	$letra = 'C';
	        	$sql = mysql_query("SELECT * FROM ProductoInformacion where idTipoDescripcion_campo in (1,3,4,5,6) ORDER BY idProductoInformacion ASC");
	        	while($col = mysql_fetch_array($sql))
	        	{
	        		$arrayPI[$col['idProductoInformacion']] = $sheet->getCell($letra.$row);
	        		$letra++;
	        	}
	        	// Comprobar SKU 
	        	$sql = mysql_query("SELECT * FROM ProductoInformacion WHERE detalle = 'SKU'");
	        	$col = mysql_fetch_array($sql);
	        	$sql2 = mysql_query("SELECT * FROM rel_ProductoInformacion_Producto WHERE idProductoInformacion = '".$col['idProductoInformacion']."' AND detalle = '".$arrayPI[$col['idProductoInformacion']]."'");
	        	$sku = $arrayPI[$col['idProductoInformacion']];
	        	if(mysql_num_rows($sql2) > 0)
	        	{
	        		array_push($Errores, 'No se ingresó el SKU '.$sku.': Ya existe el SKU en la base de datos');
	        	}
	        	////////////////
	        	// Categorias
	        	$categorias = $sheet->getCell('A'.$row);
	        	if(is_numeric($categorias)) // Una
	        	{
	        		$sql = mysql_query("SELECT * FROM ProductoCategoria WHERE idProductoCategoria = '".$categorias."'");
	        		if(mysql_num_rows($sql) == 0)
	        		{
	        			array_push($Errores, 'No se ingresó el SKU '.$sku.': El ID de categoría '.$categorias.' no existe');
	        		}
	        	}
	        	else // Varias
	        	{
	        		$cat = explode(',',$categorias);
	        		foreach($cat as $idProductoCategoria)
	        		{
	        			$sql = mysql_query("SELECT * FROM ProductoCategoria WHERE idProductoCategoria = '".$categorias."'");
	        			if(mysql_num_rows($sql) == 0)
		        		{
		        			array_push($Errores, 'No se ingresó el SKU '.$sku.': El ID de categoría '.$idProductoCategoria.' no existe');
		        		}	
	        		}
	        	}

	        	//////
	        	// Precio 
	        	$precio = str_replace('.','',$sheet->getCell('B'.$row));
	        	$precio = str_replace(',','',$precio);
	        	$precio = str_replace('$','',$precio);
	        	if(!is_numeric($precio))
	        	{
	        		array_push($Errores, 'No se ingresó el SKU '.$sku.': El precio debe ser un valor numérico (sin puntos, letras ni signos)');
	        	}
	        	////
	        	if(count($Errores))
	        	{
	        		MsjError("Se encontraron ".count($Errores)." error(es), el archivo no fue procesado");
	        		foreach($Errores as $Error) echo '<p>'.$Error.'</p>';
	        		echo '<br><br><BR>';
	        	}
	        	else // Ingresa
	        	{
	        		if($Configuracion['SistemaModelos'] == 0)
	        		{	
	        			$sql = mysql_query("SELECT * FROM ProductoInformacion WHERE detalle = 'SKU'");
	        			$col = mysql_fetch_array($sql);
	        			$idProductoInformacionSKU = $col['idProductoInformacion'];
	        			$SKU = $arrayPI[$idProductoInformacionSKU];
	        			$sql = mysql_query("SELECT * FROM rel_ProductoInformacion_Producto WHERE idProductoInformacion = '".$idProductoInformacionSKU."' AND detalle = '".$SKU."'");
	        			if(mysql_num_rows($sql)) // Editar
	        			{
	        				$col = mysql_fetch_array($sql);
	        				$idProducto = $col['idProducto'];
	        				mysql_query("DELETE FROM rel_ProductoInformacion_Producto WHERE idProducto = '".$idProducto."'");
	        				mysql_query("DELETE FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$idProducto."'");
	        			}
	        			else // Agregar
	        			{
		        			mysql_query("INSERT INTO Producto () VALUES ()");
							$idProducto = mysql_insert_id();
							
				        }
				        /* Subida Campos de Informacion */

							$sql = mysql_query("SELECT * FROM ProductoInformacion where idTipoDescripcion_campo in (1,3,4,5,6)");
							while($col = mysql_fetch_array($sql))
							{
								mysql_query("INSERT INTO rel_ProductoInformacion_Producto (`detalle`,`idProductoInformacion`,`idProducto`) VALUES('".seguridad_sql($arrayPI[$col['idProductoInformacion']])."','".$col['idProductoInformacion']."','".$idProducto."')");
							}
							/* Fin Subida Campos de Informacion */
							/* Sistema de precios */

							if($Configuracion['Precios'] == 1)

							{
								mysql_query("UPDATE Producto SET Precio = '".seguridad_sql($precio)."' WHERE idProducto = '".$idProducto."'");
							}

							/* Fin sistema de precios */
							/* Categorias */
							$categorias = $sheet->getCell('A'.$row);
				        	if(is_numeric($categorias)) // Una
				        	{
				        		mysql_query("INSERT INTO rel_Producto_ProductoCategoria (idProducto,idProductoCategoria) VALUES ('".$idProducto."','".$categorias."')");
				        	}
				        	else // Varias
				        	{
				        		$cat = explode(',',$categorias);
				        		foreach($cat as $idProductoCategoria)
				        		{
				        			mysql_query("INSERT INTO rel_Producto_ProductoCategoria (idProducto,idProductoCategoria) VALUES ('".$idProducto."','".$idProductoCategoria."')");
				        		}
				        	}
						/* Fin Categorias */
					}
					else 
					{

					}

	        	}

	        }
	    }
	    if(!count($Errores)) MsjAprob("Planilla ingresada con éxito");
    } else MsjError("Debe subir una planilla Excel .xls o .xlsx")
?>