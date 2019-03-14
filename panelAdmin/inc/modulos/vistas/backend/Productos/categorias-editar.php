<title>Categorias de Producto | <? echo $sufijoTitulo; ?></title>
	<?php
	$idProductoCategoria = $_GET['idProductoCategoria'];
	?>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Categorias de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/categorias">Categorias de Producto</a></li>
				<li class="active">Editar</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Identificador:</label><input name="nombre" maxlength="120" type="text" disabled value="<?php echo $idProductoCategoria; ?>"/></div>
					<div class="lineaform"><label>Titulo categoría:</label><input name="nombre" maxlength="120" type="text" value="<?php echo $CategoriaProductos->obtenerNombre($idProductoCategoria); ?>" required/></div>
					<div class="lineaform"><label>Posición de orden:</label><input name="orden" maxlength="120" type="number" value="<?php echo $CategoriaProductos->obtenerPosicion($idProductoCategoria); ?>" required/></div>
					<?php if($Configuracion['CategoriasDescripcion'] == 1) { ?><div class="lineaform"><label>Descripción:</label><input name="descripcion" maxlength="120" type="text" value="<?php echo $CategoriaProductos->obtenerDescripcion($idProductoCategoria); ?>"></div><?php } ?>
					<?php if($Configuracion['CategoriasImg'] == 1) { ?><div class="lineaform"><label>Imágen:</label><input name="img" maxlength="120" type="file"/></div><?php } ?>
					<input type="hidden" name="idProductoCategoria" value="<?php echo $idProductoCategoria; ?>">
					<div class="lineaform">
						<label>Categoría padre:</label>
						<select name="categoriaPadre">
							<option value="0">- Sin categoría padre -</option>
							<?php
							$sql = mysql_query("SELECT * FROM ProductoCategoria");
							while($col = mysql_fetch_array($sql))
							{
								if($col['idProductoCategoria'] != $idProductoCategoria)
								{
									?>

									<option <?php if($CategoriaProductos->obtenerPadre($idProductoCategoria) == $col['idProductoCategoria']) echo 'selected'; ?> value="<?php echo $col['idProductoCategoria']; ?>"><?php echo $col['nombre']; ?></option>
									<?
								}
							}
							?>
						</select>
					</div>
					<div class="lineaform">
						<a href="../eliminar/?idProductoCategoria=<?php echo $_GET['idProductoCategoria']; ?>" class="eliminar boton">Eliminar</a>
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoCategoria_editar.php"); ?>
		</section>
	</div>