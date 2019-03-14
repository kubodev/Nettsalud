<title>Productos | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Productos</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos">Productos</a></li>
				<li class="active">Agregar</li>
			</ol>
		</section>
		<section class="seccion">
			<?php 
			unset($_SESSION['subiendoFotos']);
			?>
			<div class="lineaform">
								<h3 style="margin-bottom:30px">Añadir imágenes</h3>
								<label>Seleccione una o varias fotos. La primera que seleccione es la portada.</label>
								<div id="divFotos"></div>
								<form id="formFotos" enctype="multipart/form-data" method="post"><input type="file" name="fotos[]" multiple></form>
			</div>
			<form id="formProductos" method="post" enctype="multipart/form-data" style="margin-top:50px">
				<?php
					$sql = mysql_query("SELECT * FROM ProductoInformacion WHERE detalle != 'URL' ORDER BY idTipoDescripcion_campo ASC");
					while($col = mysql_fetch_array($sql))
					{
						if($col['idTipoDescripcion_campo'] == 1)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<input name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>" type="text"/>
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
								<textarea name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>"></textarea>
							</div>
							<script>cargarEditor('textarea[name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>"]');</script>
							<?php
						}
						else if($col['idTipoDescripcion_campo'] == 4)
						{
							?>
							<div class="lineaform">
								<label><?php echo $col['detalle']; ?>:</label>
								<input name="ProductoInformacion<?php echo $col['idProductoInformacion']; ?>" type="number"/>
							</div>
							<?php
						}
					}

					if($Configuracion['Precios'] == 1)
					{
						?>
						<div class="lineaform" id="Precio">
							<label>Precio:</label>
							$ <input name="Precio" type="number"/>
						</div>
						<?php
					}

					if($Configuracion['SistemaDescuentos'] == 1)
					{
						?>
						<div class="lineaform descuentos">
							<label>Activar descuento</label>
							<input name="Descuento" value="1" type="checkbox"/>
						</div>
						<div id="boxDescuento">
							<div class="lineaform">
								<label>% de descuento:</label>
								<input name="Porcentaje" type="number"/> %
							</div>
							<div class="lineaform">
								<label>Precio anterior:</label>
								$ <input name="PrecioAnterior" type="number"/>
							</div>
							<div class="lineaform">
								<label>Nuevo precio:</label>
								$ <input name="PrecioNuevo" type="number"/>
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
									<option value="<?php echo $col['idProductoMarca']; ?>"><?php echo $MarcaProductos->obtenerNombre($col['idProductoMarca']); ?></option>
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
								if(!$CategoriaProductos->tieneHijos($idProductoCategoria)) 
									echo $CategoriaProductos->mostrarClickeable($idProductoCategoria,false);
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
										if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
											echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],false);
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
												if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
													echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],false);
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
												if(!$CategoriaProductos->tieneHijos($arrayCategorias[2])) 
													echo $CategoriaProductos->mostrarClickeable($arrayCategorias[2],false);
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
										if(!$CategoriaProductos->tieneHijos($arrayCategorias[1])) 
											echo $CategoriaProductos->mostrarClickeable($arrayCategorias[1],false);
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
						<div id="modelosseleccionados">
							<div id="posicionModelos"></div>
						</div>
						<div class="lineaform">
							<span class="boton" name="otromodelo">+ Agregar otro modelo</span>
						</div>
						<?php
					}
					?>
					<?php
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
											$idProducto = $col['idProducto'];
											?>
											<option value="<?php echo $idProducto; ?>"><?php echo $Producto->obtenerInformacion($idProducto)['Nombre']; ?></option>
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
					<div class="lineaform">
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_producto_agregar.php"); ?>
		</section>
	</div>