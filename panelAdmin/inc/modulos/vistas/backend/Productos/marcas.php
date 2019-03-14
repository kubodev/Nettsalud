<title>Marcas de Producto | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Marcas de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active">Marcas de Producto</li>
			</ol>
		</section>
		<section class="seccion">
			<?php
				$sql = mysql_query("SELECT * FROM ProductoMarca");
				while($col = mysql_fetch_array($sql))
				{
					if(!array_search($col['idProductoMarca'],$categoriasMostradas))
					{
						?>
						<div class="categoria">
							<a href="editar/?idProductoMarca=<?php echo $col['idProductoMarca'] ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px;" alt="" /> <?php echo $MarcaProductos->obtenerNombre($col['idProductoMarca']); ?></a>
						</div>
						<?php
						
					}
				}
				?>
				<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nueva marca</a>
		</section>
	</div>