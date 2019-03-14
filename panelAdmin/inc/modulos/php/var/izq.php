				<div class="col-md-3" id="ColIzq">	
		   			<span class="h2">PRODUCTOS</span>
					<ul class="izq">

						<?php
								$categoriasMostradas=array();
								$Categoria = new CategoriaProductos();
								$sql = mysql_query("SELECT * FROM ProductoCategoria");
								while($col = mysql_fetch_array($sql))
								{
									if(!array_search($col['idProductoCategoria'],$categoriasMostradas))
									{
										
										$sql2 = mysql_query("SELECT * FROM rel_ProductoCategoria_ProductoCategoria WHERE idProductoCategoria_Hijo = '".$col['idProductoCategoria']."'");
										if(!mysql_num_rows($sql2)) $esPadre = 1;
										if($Categoria->tieneHijos($col['idProductoCategoria']))
										{ 
											array_push($categoriasMostradas,$col['idProductoCategoria']);
											?>
											<li>
												<a href="#"><?php echo seguridad_php($col['nombre'])?></a>
															<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-c<?php echo $col['idProductoCategoria']; ?>" aria-expanded="true">

																<span class="glyphicon glyphicon-triangle-bottom"></span>

															</button>
															<ul class="subcat navbar-collapse collapse" id="bs-example-navbar-collapse-c<?php echo $col['idProductoCategoria']; ?>" aria-expanded="true" style="height: 0px;">
											<?php
										}
										else
										{
											?>
											<li>
												<a href="?idProductoCategoria=<?php echo $col['idProductoCategoria']; ?>"><?php echo seguridad_php($col['nombre'])?></a>
											</li>
											<?php
										}
												
													$sql3 = mysql_query("SELECT * FROM ProductoCategoria inner join rel_ProductoCategoria_ProductoCategoria on ProductoCategoria.idProductoCategoria = rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Hijo WHERE rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Padre = '".$col['idProductoCategoria']."' order by idProductoCategoria");
													
													while($col3 = mysql_fetch_array($sql3))
													{
														array_push($categoriasMostradas,$col3['idProductoCategoria']);
														if($Categoria->tieneHijos($col3['idProductoCategoria']))
														{ 
															array_push($categoriasMostradas,$col3['idProductoCategoria']);
															?>
															<li>
																<a href="#"><?php echo seguridad_php($col3['nombre'])?></a>
																<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-c<?php echo $col3['idProductoCategoria']; ?>" aria-expanded="true">

																				<span class="glyphicon glyphicon-triangle-bottom"></span>

																</button>
																<ul class="subcat navbar-collapse collapse" id="bs-example-navbar-collapse-c<?php echo $col3['idProductoCategoria']; ?>" aria-expanded="true" style="height: 0px;">
																<?php
																$sql4 = mysql_query("SELECT * FROM ProductoCategoria inner join rel_ProductoCategoria_ProductoCategoria on ProductoCategoria.idProductoCategoria = rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Hijo WHERE rel_ProductoCategoria_ProductoCategoria.idProductoCategoria_Padre = '".$col3['idProductoCategoria']."' order by idProductoCategoria");
													
																while($col4 = mysql_fetch_array($sql4))
																{
																	array_push($categoriasMostradas,$col4['idProductoCategoria']);
																	?>
																	<li><a href="<?php echo $ruta; ?>productos/?idProductoCategoria=<?php echo $col4['idProductoCategoria']; ?>"><?php echo seguridad_php($col4['nombre']); ?></a></li>
																	<?php
																}
														}
														else
														{
															?>
															<li><a href="<?php echo $ruta; ?>productos/?idProductoCategoria=<?php echo $col3['idProductoCategoria']; ?>"><?php echo seguridad_php($col3['nombre']); ?></a></li>
															<?php
														}
														if($Categoria->tieneHijos($col3['idProductoCategoria']))
														{ 
															?>
																</li>
															</ul>
															<?php
														}
														
													}
										if($Categoria->tieneHijos($col['idProductoCategoria']))
										{ 
											?>
												</li>
											</ul>
											<?php
										}
									}
								}
								?>

					</ul>
				</div>
		   		