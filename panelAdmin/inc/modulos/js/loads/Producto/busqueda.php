<?php
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");
$varBuscar = seguridad_sql($_POST["name"]);
$cargadorItems=array();
$query = "select * from Producto";
							$sql = mysql_query($query);
							if(mysql_num_rows($sql))
							{
								while($col = mysql_fetch_array($sql))
								{
									array_push($cargadorItems, $col['idProducto']);
								}
								$cargadorItems = $CategoriaProductos->busquedaPorNombre($cargadorItems,$varBuscar);
								$contadorItems = 1;
								foreach($cargadorItems as $idProducto) 
								{
									
									?>
									<tr>
										<td><?php echo $idProducto; ?></td>
										<td><?php echo $Producto->obtenerInformacion($idProducto)['Nombre']; ?></td>
										<td><?php echo $CategoriaProductos->obtenerNombre($Producto->arrayCategorias($idProducto)[0]); ?></td>
										<td>
											<a href="editar/?idProducto=<?php echo $idProducto; ?>" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
											<a href="eliminar/?idProducto=<?php echo $idProducto; ?>" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
										</td>
									</tr>
									<?php 
									$contadorItems++;
								}
								if($contadorItems == 1) MsjError("No hay resultados");

							}else MsjError("No existen productos registrados en esta categoría.");

