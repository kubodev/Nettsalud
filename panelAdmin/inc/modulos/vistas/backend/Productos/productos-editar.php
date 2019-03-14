<title>Productos | <? echo $sufijoTitulo; ?></title>
<?php
$idProducto = $_GET['idProducto'];
?>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Productos</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos">Productos</a></li>
				<li class="active">Editar</li>
			</ol>
		</section>
		<section class="seccion">
					<h5>Imágenes de producto</h5>
								<div class="espacioFotos">

									<div class="formulariors">
										<form enctype="multipart/form-data" id="formFotos" data-idProducto="<?php echo $idProducto; ?>" method="post">
											<div class="form-group">
												<p class="help-block">Máximo 20 fotos</p>
												<label for="exampleInputFile">Seleccione una o varias fotos</label>
												<input type="file" name="fotos[]" id="exampleInputFile" multiple>
											</div>
											<input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">
										</form>
									</div>
									<div id='cargador_php_form'></div>
									<div id="divFotos<?php echo $idProducto; ?>">
									<?php
										unset($_SESSION['subiendoFotos']);
										
										$sql2 = mysql_query("SELECT * FROM ProductoFoto WHERE idProducto = '".seguridad_sql($idProducto)."' ORDER BY idProductoFoto ASC");
										$cantidadFotos = mysql_num_rows($sql2);
										while($col2 = mysql_fetch_array($sql2))
										{
											$foto = $col2['NombreArchivo'];
											$_SESSION['subiendoFotos'][$idProducto][$foto] = $foto;?>
											<div class="col-xs-3 col-md-3" id="<?php echo $col2['idProductoFoto']; ?>">
												<figure class="fotoSubir">
													<img src="<?php echo $Configuracion['Ruta']; ?>panelAdmin/img/Productos/<?php echo $foto; ?>" class="img-responsive" alt="">
													<a href="javascript:elimFoto('<?php echo $foto; ?>',<?php echo $idProducto; ?>,<?php echo $col2['idProductoFoto']; ?>)"><img src="<?php echo $Configuracion['Ruta'].$Configuracion['CarpetaPanel']; ?>/img/cerrarCruz.png"></a>
												</figure>
											</div>
										<?php 
										} 
										?>
										<div class="clear"></div>
									</div>

								</div>
					<div class="clear" style="height:60px"></div>
				<form id="formProductos" method="post" enctype="multipart/form-data">
					<?php
					
					$sql = mysql_query("SELECT * FROM ProductoInformacion ORDER BY idTipoDescripcion_campo ASC");
					while($col = mysql_fetch_array($sql))
					{
						if($col['idTipoDescripcion_campo'] == 1)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<input value="<?php echo $Producto->obtenerInformacion($idProducto)[$col['detalle']]; ?>" name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>" type="text"/>
							</div>
							<?php
						}
						else if($col['idTipoDescripcion_campo'] == 2)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<input name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>" type="file"/>
							</div>
							<?php
						}
						else if($col['idTipoDescripcion_campo'] == 6)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<textarea name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>"><?php echo $Producto->obtenerInformacion($idProducto)[$col['detalle']]; ?></textarea>
							</div>
							<script>cargarEditor('textarea[name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>"]');</script>
							<?php
						}
						else if($col['idTipoDescripcion_campo'] == 4)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<input value="<?php echo $Producto->obtenerInformacion($idProducto)[$col['detalle']]; ?>" name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>" type="number"/>
							</div>
							<?php
						}
					}

					if($Configuracion['Precios'] == 1)
					{
						?>
						<div class="lineaform" id="Precio" <?php if($Producto->Descuento($idProducto)) echo 'style="display:none;"'; ?>>
							<label>Precio:</label>
							<input name="Precio" value="<?php echo $Producto->obtenerAtributo('Precio',$idProducto); ?>" type="number"/>
						</div>
						<?php
					}

					if($Configuracion['SistemaDescuentos'] == 1)
					{
						?>
						<div class="lineaform descuentos">
							<label>Activar descuento</label>
							<input name="Descuento" type="checkbox" value="1" <?php if($Producto->Descuento($idProducto)) echo 'checked'; ?>>
						</div>
						<div id="boxDescuento" <?php if($Producto->Descuento($idProducto)) echo 'style="display:block;"'; ?>>
							<div class="lineaform">
								<label>% de descuento:</label>
								<input name="Porcentaje" type="number" value="<?php echo $Producto->Descuento($idProducto)['Porcentaje']; ?>"> %
							</div>
							<div class="lineaform">
								<label>Precio anterior:</label>
								<input name="PrecioAnterior" type="number" value="<?php echo $Producto->Descuento($idProducto)['PrecioAnterior']; ?>">
							</div>
							<div class="lineaform">
								<label>Nuevo precio:</label>
								<input name="PrecioNuevo" type="number" value="<?php echo $Producto->Descuento($idProducto)['PrecioNuevo']; ?>">
							</div>
						</div>
						<?php
					}

					if($Configuracion['SistemaMarcas'] == 1)
					{
						?>
						<div class="lineaform">
							<label>Marca:</label>
							<select name="idProductoMarca">
								<?php
								$sql = mysql_query("SELECT * FROM ProductoMarca");
								while($col = mysql_fetch_array($sql))
								{
									
									?>
									<option <?php if($Producto->obtenerAtributo('idProductoMarca',$idProducto) == $col['idProductoMarca']) echo 'selected '; ?>value="<?php echo $col['idProductoMarca']; ?>"><?php echo $MarcaProductos->obtenerNombre($col['idProductoMarca']); ?></option>
									<?
									
								}
								?>
							</select>
						</div>
						<?php
					}
					?>
					<h3>Categorías</h3>
					<ul class="listaCategorias">
						<?php
						$varHijos = array();
						$arrayCategorias = array();
						$categorias = $CategoriaProductos->obtenerCategorias();
						foreach($categorias as $arrayCategorias[0] => $varHijos[0])
						{
							if(!is_array($varHijos[0])) $idProductoCategoria = $varHijos[0]; else $idProductoCategoria = $arrayCategorias[0];
							?>
							<li>
								<?php
								if($Producto->perteneceACategoria($idProductoCategoria,$idProducto)) $checked = true; else $checked = false;
								if(!$CategoriaProductos->tieneHijos($idProductoCategoria)) 
									echo $CategoriaProductos->mostrarClickeable($idProductoCategoria,$checked);
								else 
									echo $CategoriaProductos->mostrarNoClickeable($idProductoCategoria);
								?>
							</li>
							<?php
							foreach($varHijos[0] as $arrayCategorias[1] => $varHijos[1])
							{
								if(is_array($varHijos[1]))
								{
									?>
									<li style="margin-left:20px">
										<?php
										if($Producto->perteneceACategoria($arrayCategorias[1],$idProducto)) $checked = true; else $checked = false;
										if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
											echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],$checked);
										else 
											echo $CategoriaProductos->mostrarNoClickeable($arrayCategorias[1]);
										?>
									</li>
									<?php
									foreach($varHijos[1] as $arrayCategorias[2] => $varHijos[2])
									{
										if(is_array($varHijos[2]))
										{
											?>
											<li style="margin-left:20px">
												<?php
												if($Producto->perteneceACategoria($arrayCategorias[1],$idProducto)) $checked = true; else $checked = false;
												if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
													echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],$checked);
												else 
													echo $CategoriaProductos->mostrarNoClickeable($arrayCategorias[1]);
												?>
											</li>
											<?php
										}
										else 
										{
											?>
											<li style="margin-left:40px">
												<?php
												if($Producto->perteneceACategoria($arrayCategorias[2],$idProducto)) $checked = true; else $checked = false;
												if(!$CategoriaProductos->tieneHijos($arrayCategorias[2])) 
													echo $CategoriaProductos->mostrarClickeable($arrayCategorias[2],$checked);
												else 
													echo $CategoriaProductos->mostrarNoClickeable($arrayCategorias[2]);
												?>
											</li>
											<?php
										}
									}
								}
								else 
								{
									?>
									<li style="margin-left:20px">
										<?php
										if($Producto->perteneceACategoria($arrayCategorias[1],$idProducto)) $checked = true; else $checked = false;
										if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
											echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],$checked);
										else 
											echo $CategoriaProductos->mostrarNoClickeable($arrayCategorias[1]);
										?>
									</li>
									<?php
								}
							}
						}
						?>
						<div class="clear"></div>
					</ul>
					<?php
					if($Configuracion['SistemaModelos'] == 1)
					{
						?>
						<input type="hidden" name="ultimoModelo" value="1">
						<div id="modelosseleccionados">
							<div id="posicionModelos"></div>
						</div>
						<div class="lineaform">
							<span class="boton" name="otromodelo">+ Agregar otro modelo</span>
						</div>
						<?php
					}
					if($Configuracion['ProductosRelacionados'] > 0)
					{
						?>
						<div class="productosRelacionados">
							<h3>Productos relacionados</h3>
							<div class="clear" style="height:30px"></div>
							<?php
							for($aux = 1; $aux<=$Configuracion['ProductosRelacionados']; $aux++)
							{
								?>
								<div class="lineaform">
									<select name="relacionado_<?php echo $aux; ?>">
										<option value="0">-- Ninguno --</option>
										<?php
										$sql = mysql_query("SELECT * FROM Producto");
										while($col = mysql_fetch_array($sql))
										{
											$idProducto2 = $col['idProducto'];
											?>
											<option value="<?php echo $idProducto2; ?>" <?php if($Producto->relacionados($idProducto)[$aux-1] == $idProducto2) echo 'selected'; ?>><?php echo $Producto->obtenerInformacion($idProducto2)['Nombre']; ?></option>
											<?php
										}
										?>
									</select>
								</div>
								<?php
							}
							?>

						</div>
						<?php
					}
					?>
					<input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">
					<div class="lineaform">
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Guardar cambios</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_producto_editar.php"); ?>
		</section>
	</div>