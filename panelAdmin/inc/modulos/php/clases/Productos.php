<?php 

	class Productos 

	{
		public function GenerarExcelAgregarProductos()
		{
			$dir=explode('inc',dirname(__FILE__));
    		require_once $dir[0].'inc/modulos/php/phpexcel/PHPExcel/IOFactory.php';
    		 $objPHPExcel = new PHPExcel();
    		 $objPHPExcel->getProperties()->setCreator("MMW") // Nombre del autor
		    ->setLastModifiedBy("MMW") //Ultimo usuario que lo modificó
		    ->setTitle("Agregar productos") // Titulo
		    ->setSubject("Agregar productos") //Asunto
		    ->setDescription("Agregar productos") //Descripción
		    ->setKeywords("agregar productos") //Etiquetas
		    ->setCategory("Agregar productos"); //Categorias
		    // Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			    ->mergeCells('A1:D1');
			 
			// Se agregan los titulos del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			    ->setCellValue('A1','AGREGAR PRODUCTOS');
			$columna = 'A';
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2','ID. Categorías (separe por comas)');
			$columna++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2','Precio');
			$columna++;
			
			$sql = mysql_query("SELECT * FROM ProductoInformacion where idTipoDescripcion_campo in (1,3,4,5,6) ORDER BY idProductoInformacion ASC");
			while($col = mysql_fetch_array($sql))
			{
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2',$col['detalle']);
				$columna++;
			}
			
			$objPHPExcel->setActiveSheetIndex(0);
			// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Planilla_Agregar.xlsx"');
			header('Cache-Control: max-age=0');
			 
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		public function GenerarExcelEditarProductos()
		{
			$dir=explode('inc',dirname(__FILE__));
    		require_once $dir[0].'inc/modulos/php/phpexcel/PHPExcel/IOFactory.php';
    		 $objPHPExcel = new PHPExcel();
    		 $objPHPExcel->getProperties()->setCreator("MMW") // Nombre del autor
		    ->setLastModifiedBy("MMW") //Ultimo usuario que lo modificó
		    ->setTitle("Editar productos") // Titulo
		    ->setSubject("Editar productos") //Asunto
		    ->setDescription("Editar productos") //Descripción
		    ->setKeywords("Editar productos") //Etiquetas
		    ->setCategory("Editar productos"); //Categorias
		    // Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			    ->mergeCells('A1:D1');
			 
			// Se agregan los titulos del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			    ->setCellValue('A1','EDITAR PRODUCTOS');
			$columna = 'A';
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2','ID. Categorías (separe por comas)');
			$columna++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2','Precio');
			$columna++;
			
			$sql = mysql_query("SELECT * FROM ProductoInformacion where idTipoDescripcion_campo in (1,3,4,5,6) ORDER BY idProductoInformacion ASC");
			while($col = mysql_fetch_array($sql))
			{
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.'2',$col['detalle']);
				$columna++;
			}

			
			$fila = 3;
			$sql = mysql_query("SELECT * FROM Producto");
			while($col = mysql_fetch_array($sql))
			{
				$idProducto = $col['idProducto'];
				/* Categorias */
				$cat = '';
				$sql2 = mysql_query("SELECT * FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$idProducto."'");
				while($col2 = mysql_fetch_array($sql2))
				{	
					if(strlen($cat)) $cat.=',';
					$cat = $cat.=$col2['idProductoCategoria'];
				}
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$fila,$cat);
				/* Fin Categorias */
				/* Precio */
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$fila,$this->obtenerAtributo('Precio',$idProducto));
				
				/* Fin Precio */
				/* Informacion */
				$columna = 'C';
				$sql2 = mysql_query("SELECT * FROM ProductoInformacion where idTipoDescripcion_campo in (1,3,4,5,6) ORDER BY idProductoInformacion ASC");
				while($col2 = mysql_fetch_array($sql2))
				{

					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($columna.$fila,$this->obtenerInformacion($idProducto)[$col2['detalle']]);
					$columna++;
				}
				/* Fin Informacion */
				$fila++;
			}
			
			$objPHPExcel->setActiveSheetIndex(0);
			// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Planilla_Editar.xlsx"');
			header('Cache-Control: max-age=0');
			 
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		public function relacionados($idProducto)
		{
			$aux = array();
			$sql = mysql_query("SELECT * FROM rel_Producto_Producto WHERE idProducto_1 = '".seguridad_sql($idProducto)."'");
			while($col = mysql_fetch_array($sql))
			{
				array_push($aux,$col['idProducto_2']);
			}
			return $aux;
		}
		public function CodigoInformacion($idCodigoDescuento)
		{
			$sql = mysql_query("SELECT * FROM CodigoDescuento WHERE idCodigoDescuento = '".seguridad_sql($idCodigoDescuento)."'");

			$col = mysql_fetch_array($sql);

			return $col;
		}
		public function CodigoInformacionPorCodigo($Codigo)
		{
			$sql = mysql_query("SELECT * FROM CodigoDescuento WHERE Codigo = '".seguridad_sql($Codigo)."'");

			$col = mysql_fetch_array($sql);

			return $col;
		}
		public function cargarModelos($idProducto) 
		{
			$sql2=mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto inner join ProductoAtributoDetalle on rel_ProductoAtributoDetalle_Producto.idProductoAtributoDetalle = ProductoAtributoDetalle.idProductoAtributoDetalle WHERE rel_ProductoAtributoDetalle_Producto.idProducto = '".seguridad_sql($idProducto)."' AND Stock > '0' ORDER BY ProductoAtributoDetalle.idProductoAtributo ASC");
			$numeroModelos=0;
			while($col2=mysql_fetch_array($sql2)) 
			{
				if($pasado[$col2['idProductoAtributo']]==0) {
					$numeroModelos++;
					$pasado[$col2['idProductoAtributo']]=1;
					$arrayDetalles[$numeroModelos]=$col2['idProductoAtributo'];
				}
			}
			if($numeroModelos > 0) 
			{
				$idDetalle=1;
				$sql4=mysql_query("SELECT * FROM ProductoAtributo WHERE idProductoAtributo = '".$arrayDetalles[$idDetalle]."' order by idProductoAtributo ASC");
				$col4=mysql_fetch_array($sql4);
				?> <div class="ProductoAtributo" id="detalle<?php echo $idDetalle; ?>"> <h5>Seleccione <?php echo $col4['detalle'];
				?></h5> 
				<?php 
				if(strtolower($col4['detalle']) !="color" && strtolower($col4['detalle']) !="colores") 
				{
					$sql5=mysql_query("SELECT * FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".$col4['idProductoAtributo']."'");
					while($col5=mysql_fetch_array($sql5)) {
						$sql7=mysql_query("SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($idProducto)."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
						$col7=mysql_fetch_array($sql7);
						if($this->stock(seguridad_sql($idProducto), $col7['idRel_ProductoAtributoDetalle_Producto']) > 0) echo'<a id="valor'.$col5['idProductoAtributoDetalle'].'" href="javascript:seleccionaDetalle('.$col5['idProductoAtributoDetalle'].','.$idDetalle.','.$col7['idRel_ProductoAtributoDetalle_Producto'].','.$col5['idProductoAtributo'].')">'.$col5['detalle'].'</a>';
					}
					?> <?php
				}
				else  { //Es color
					$sql5=mysql_query("SELECT * FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".$col4['idProductoAtributo']."'");
					while($col5=mysql_fetch_array($sql5)) {
						$sql6=mysql_query("SELECT detalle FROM ProductoAtributoDetalle_colores WHERE idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
						$col6=mysql_fetch_array($sql6);
						$sql7=mysql_query("SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($idProducto)."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
						$col7=mysql_fetch_array($sql7);
						if($this->stock(seguridad_sql($idProducto), $col7['idRel_ProductoAtributoDetalle_Producto']) > 0) echo'<a id="valor'.$col5['idProductoAtributoDetalle'].'" href="javascript:seleccionaDetalle('.$col5['idProductoAtributoDetalle'].','.$idDetalle.','.$col7['idRel_ProductoAtributoDetalle_Producto'].','.$col5['idProductoAtributo'].')" title="'.$col5['detalle'].'" class="color" style="background-color:'.$col6['detalle'].'"></a>';
					}
				}
				?> </div> <?php ?> <script> var totalDetalles=<?php echo $numeroModelos;
				?>;
				var detalleActual=1;
				var arrayDetallesSeleccionados=[];
				var posicion=[];
				function seleccionaDetalle(idProductoAtributoDetalle, idDetalle, idRel_ProductoAtributoDetalle_Producto, idProductoAtributo) {
					if(posicion[(idDetalle)]==idProductoAtributo) detalleActual--;
					arrayDetallesSeleccionados[idProductoAtributo]=idProductoAtributoDetalle;
					var cantidad = $('#cantidad').val();
					if((idDetalle + 1) <=totalDetalles) {
						var proximoDetalle=idDetalle+1;
						if(posicion[(idDetalle)] !=idProductoAtributo) $('<div id="cargadetalle'+(detalleActual+1)+'" style="display:none"></div>').insertAfter('#detalle'+detalleActual);
						$('#cargadetalle'+(detalleActual+1)).load('<?php echo $GLOBALS['ruta']; ?>panelAdmin/inc/modulos/js/loads/Producto/cargaDetallesProducto.php', {
							idProducto: <?php echo seguridad_php($idProducto);
							?>, idDetalle:proximoDetalle, arrayDetalles:'<?php echo json_encode($arrayDetalles);?>', idProductoAtributoDetalle:idProductoAtributoDetalle, arrayDetallesSeleccionados: JSON.stringify(arrayDetallesSeleccionados)
						}
						);
						$('#cargadetalle'+(detalleActual+1)).fadeIn("slower");
						detalleActual++;
					}
					else {
						subir_producto_al_carro(<?php echo seguridad_sql($idProducto);
						?>, idRel_ProductoAtributoDetalle_Producto, cantidad);
					}
					$('#detalle'+idDetalle+' a').css("opacity", "0.5");
					$('#detalle'+idDetalle+' a#valor'+idProductoAtributoDetalle).css("opacity", "1");
					posicion[(idDetalle)]=idProductoAtributo;
				}
				</script> <?php
			}
			else echo'<button class="add cart">No hay stock</button>';
		}
		public function stock($idProducto,$idRel_ProductoAtributoDetalle_Producto)
		{
			$sql = mysql_query("SELECT Stock FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".seguridad_sql($idRel_ProductoAtributoDetalle_Producto)."'");
			if(mysql_num_rows($sql) > 0)
			{
				$col = mysql_fetch_array($sql);
				return $col['Stock'];
			} else return 0;
		}
		public function StockGeneral($idProducto)
		{
			$stock=0;
			$sql = mysql_query("SELECT Stock as stock FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".$idProducto."'");
			while($col = mysql_fetch_array($sql))
			{
				$stock += $col['stock'];
			}
			return $stock;
		}
		public function nombreAtributo($idProductoAtributo)
		{


			$sql = mysql_query("SELECT detalle FROM ProductoAtributo WHERE idProductoAtributo = '".seguridad_sql($idProductoAtributo)."'");

			$col = mysql_fetch_array($sql);

			return $col['detalle'];

		}
		public function StockPorAtributo($idProductoAtributo,$idProducto)
		{
			$aux = array();
			$sql = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto 
			inner join ProductoAtributoDetalle on ProductoAtributoDetalle.idProductoAtributoDetalle = rel_ProductoAtributoDetalle_Producto.idProductoAtributoDetalle 
			WHERE rel_ProductoAtributoDetalle_Producto.idProducto = '".$idProducto."' AND ProductoAtributoDetalle.idProductoAtributo = '".$idProductoAtributo."'
			GROUP BY rel_ProductoAtributoDetalle_Producto.idRel_ProductoAtributoDetalle_Producto");
			while($col = mysql_fetch_array($sql))
			{
				$aux[$col['idProductoAtributoDetalle']] = $col['Stock'];
			}
			return $aux;

		}
		function metaTitle($idProducto)
		{
			$aux = '
			<meta property="og:title" content="'.htmlentities($this->obtenerInformacion($idProducto)['Nombre']." - ".$GLOBALS['Sufijo']).'" />
			';
			$aux .= '
				<meta property="og:image" content="'.$GLOBALS['ruta'].'panelAdmin/img/Productos/'.$this->obtenerFoto($idProducto,1).'" />
				';
			$aux .= '
			<meta name="description" content="Compra '.htmlentities(strip_tags($this->obtenerInformacion($idProducto)['Nombre'])).' en Providencia. Tenemos medios de pago y despacho a santiago y regiones." />
			';
			$aux .= '
			<meta name="keywords" content="alimentos, mascotas, exoticas, heno, veterinaria, consulta veterinaria, hurones" />
			';
			$aux .= "<title>".$this->obtenerInformacion($idProducto)['Nombre']." - ".$GLOBALS['Sufijo']."</title>";
			return $aux;
		}
		public function nombreAtributoDetalle($idProductoAtributoDetalle)
		{


			$sql = mysql_query("SELECT detalle FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($idProductoAtributoDetalle)."'");

			$col = mysql_fetch_array($sql);

			return $col['detalle'];

		}
		public function Descuento($idProducto)
		{
			$sql = mysql_query("SELECT * FROM ProductoDescuento WHERE idProducto = '".seguridad_sql($idProducto)."'");
			if(mysql_num_rows($sql))
			{
				return mysql_fetch_array($sql);
			} else return false;
		}
		public function precioFinal($idProducto,$idRel_ProductoAtributoDetalle_Producto)
		{
			if($GLOBALS['Configuracion']['SistemaModelos'] == 1&&$idRel_ProductoAtributoDetalle_Producto)
			{
				$sql = mysql_query("SELECT Precio FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".$idRel_ProductoAtributoDetalle_Producto."'");
				$col = mysql_fetch_array($sql);
				return $col['Precio'];
			}
			else
			{
				if($this->Descuento($idProducto))
				{
					return $this->Descuento($idProducto)["PrecioNuevo"];
				}
				else return $this->obtenerAtributo('Precio',$idProducto);
			}
		}	
		public function perteneceACategoria($idProductoCategoria,$idProducto)

		{
			$CategoriaProductos = new CategoriaProductos();
			$Pasa = 0;
			$sql = mysql_query("SELECT * FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$idProducto."'");
			while($col = mysql_fetch_array($sql))
			{
				
				print_r($Familia);
				if($idProductoCategoria == $CategoriaProductos->obtenerPadre($col['idProductoCategoria'])||$col['idProductoCategoria'] == $idProductoCategoria) $Pasa = 1;

			}	
			if($Pasa==1) return true; else return false;

		}

		public function obtenerAtributo($atributo,$idProducto)

		{

			$sql = mysql_query("SELECT ".seguridad_sql($atributo)." FROM Producto WHERE idProducto = '".seguridad_sql($idProducto)."'");

			$col = mysql_fetch_array($sql);

			return $col[$atributo];

		}

		public function arrayCategorias($idProducto)

		{

			$auxReturn = array();

			$sql = mysql_query("SELECT idProductoCategoria FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$idProducto."'");

			while($col = mysql_fetch_array($sql))

			{

				array_push($auxReturn,$col['idProductoCategoria']);

			}

			return $auxReturn;

		}

		public function obtenerInformacion($idProducto)

		{

			$array = array();

			$sql = mysql_query("SELECT * FROM rel_ProductoInformacion_Producto WHERE idProducto = '".seguridad_sql($idProducto)."'");

			while($col = mysql_fetch_array($sql))

			{

				$sql2 = mysql_query("SELECT detalle FROM ProductoInformacion WHERE idProductoInformacion = '".$col['idProductoInformacion']."'");

				$col2 = mysql_fetch_array($sql2);

				$array[$col2['detalle']] = $col['detalle'];

			}

			return $array;

		}

		public function obtenerFoto($idProducto,$foto)

		{

			$limit = $foto-1;

			$sql = mysql_query("select * from ProductoFoto where idProducto = '".seguridad_sql($idProducto)."' ORDER BY idProductoFoto ASC LIMIT ".$limit.",1");

			$col = mysql_fetch_array($sql);

			return $col['NombreArchivo'];

		}
		public function NombreModelo($SKU)
		{
			$ret = '';
			$sql = mysql_query("SELECT ProductoAtributo.detalle as Uno,ProductoAtributoDetalle.detalle as Dos FROM rel_ProductoAtributoDetalle_Producto 
				inner join ProductoAtributoDetalle on ProductoAtributoDetalle.idProductoAtributoDetalle = rel_ProductoAtributoDetalle_Producto.idProductoAtributoDetalle
				inner join ProductoAtributo on ProductoAtributo.idProductoAtributo = ProductoAtributoDetalle.idProductoAtributo
				WHERE rel_ProductoAtributoDetalle_Producto.SKU = '".$SKU."'");

			while($col = mysql_fetch_array($sql))
			{
				if(strlen($ret)>0) $ret .= ', ';
				$ret.=$col['Uno'].':'.$col['Dos'];
			}
			return $ret;
		}
		public function obtenerFotos($idProducto)
		{
			$auxReturn = array();

			$sql = mysql_query("SELECT * FROM ProductoFoto WHERE idProducto = '".$idProducto."' ORDER BY idProductoFoto ASC");

			while($col = mysql_fetch_array($sql))

			{

				array_push($auxReturn,$col['NombreArchivo']);

			}

			return $auxReturn;
		}

	}

