<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Productos</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Productos</li>
		</ol>
	</section>

	<?php
	$sql=mysql_query("SELECT * FROM Producto ORDER BY idProducto DESC");
	if(mysql_num_rows($sql))
	{ 
		?>
		<section class="seccion">
			<div class="table-responsive">
				<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
				<script>
					$(document).ready(function() { 


					$(".tablesearch").hide();
					// Search
					function search() {

						var form=$("#busq");
						var query_value = $('input#name').val();
						if(query_value !== ''){

							$.ajax({

					            type:"POST",

					            url: "<?php echo $ruta; ?>inc/modulos/js/loads/Producto/busqueda.php",

					            data:form.serialize(),//only input

					            success: function(response)
					            { 
					                $("table#resultTable tbody").html(response);

					            }

					        });
						}return false;    
					}

					$("input#name").live("keyup", function(e) {
						// Set Timeout
						clearTimeout($.data(this, 'timer'));
						
						// Set Search String
						var search_string = $(this).val();
						
						// Do Search
						if (search_string == '') {
							$(".tablesearch").fadeOut(300);
						}else{
							$(".tablesearch").fadeIn(300);
							$(this).data('timer', setTimeout(search, 100));
						};
					});

					});
				</script>
				<form class="form-horizontal" name="search" role="form" id="busq" method="POST" onkeypress="return event.keyCode != 13;" style="margin-bottom:10px">
					<div class="input-group col-sm-11">
						<input id="name" name="name" type="text" class="form-control" placeholder="Buscar producto..." autocomplete="off"/>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default btnSearch">
								<span class="glyphicon glyphicon-search"> </span>
							</button> </span>
					</div>
				</form>
				<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nuevo producto</a>
				<table class="table" id="resultTable">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while($col=mysql_fetch_array($sql))
						{ 
							$idProducto = $col['idProducto'];
							?>
							<tr>
								<td><?php echo $idProducto; ?></td>
								<td><?php echo $Producto->obtenerInformacion($idProducto)['Nombre']; ?></td>
								<td><?php echo $CategoriaProductos->obtenerNombre($Producto->arrayCategorias($idProducto)[0]); ?></td>
								<td>
									<a href="editar/?idProducto=<?php echo $idProducto; ?>" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="eliminar/?idProducto=<?php echo $idProducto; ?>" onclick="return confirm('¿Realmente deseas eliminar este producto?')" data-toggle="tooltip" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
								</td>
							</tr>
							<?php 
						} 
						?>
					</tbody>
				</table>
			</div>
		</section>
		<?php 
	} else msjError("Aún no hay productos, intenta <mark>agregar</mark> uno."); ?>
	<section class="seccion">
		<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nuevo producto</a>
	</section>
</div>