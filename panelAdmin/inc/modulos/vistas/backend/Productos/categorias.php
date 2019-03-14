<title>Categorias de Producto | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Categorias de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active">Categorias de Producto</li>
			</ol>
		</section>
		<section class="seccion">
			<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nueva categoría</a>
			<?php
				$varHijos = array();
				$arrayCategorias = array();
				$categorias = $CategoriaProductos->obtenerCategorias();
				foreach($categorias as $arrayCategorias[0] => $varHijos[0])
				{
					if(!is_array($varHijos[0])) $idProductoCategoria = $varHijos[0]; else $idProductoCategoria = $arrayCategorias[0];
					?>
					<div class="categoria"><a href="editar/?idProductoCategoria=<?php echo $idProductoCategoria; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px;" alt="" /> <?php echo $CategoriaProductos->obtenerNombre($idProductoCategoria);?></a></div>
					<?php
					foreach($varHijos[0] as $arrayCategorias[1] => $varHijos[1])
					{
						if(is_array($varHijos[1]))
						{
							?>
							<div class="categoria"><a href="editar/?idProductoCategoria=<?php echo $arrayCategorias[1]; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px; margin-left:20px" alt="" /> <?php echo $CategoriaProductos->obtenerNombre($arrayCategorias[1]);?></a></div>
							<?php
							foreach($varHijos[1] as $arrayCategorias[2] => $varHijos[2])
							{
								if(is_array($varHijos[2]))
								{
									?>
									<div class="categoria"><a href="editar/?idProductoCategoria=<?php echo $arrayCategorias[1]; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px; margin-left:20px" alt="" /> <?php echo $CategoriaProductos->obtenerNombre($arrayCategorias[1]);?></a></div>
									<?php
								}
								else 
								{
									?>
									<div class="categoria"><a href="editar/?idProductoCategoria=<?php echo $arrayCategorias[2]; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px; margin-left:40px" alt="" /> <?php echo $CategoriaProductos->obtenerNombre($arrayCategorias[2]);?></a></div>
									<?php
								}
							}
						}
						else 
						{
							?>
							<div class="categoria"><a href="editar/?idProductoCategoria=<?php echo $arrayCategorias[1]; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px; margin-left:20px" alt="" /> <?php echo $CategoriaProductos->obtenerNombre($arrayCategorias[1]);?></a></div>
							<?php
						}
					}
				}
				?>
				<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nueva categoría</a>
		</section>
	</div>