<title>Marcas de Producto | <? echo $sufijoTitulo; ?></title>
	<?php
	$idProductoMarca = $_GET['idProductoMarca'];
	?>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Marcas de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/marcas">Marcas de Producto</a></li>
				<li class="active">Editar</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Titulo categoría:</label><input name="nombre" maxlength="120" type="text" value="<?php echo $MarcaProductos->obtenerNombre($idProductoMarca); ?>" required/></div>
					<?php if($Configuracion['MarcasImg'] == 1) { ?><div class="lineaform"><label>Imágen:</label><input name="img" maxlength="120" type="file"/></div><?php } ?>
					<input type="hidden" name="idProductoMarca" value="<?php echo $idProductoMarca; ?>">
					<div class="lineaform">
						<a href="../eliminar/?idProductoMarca=<?php echo $_GET['idProductoMarca']; ?>" class="eliminar boton">Eliminar</a>
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoMarca_editar.php"); ?>
		</section>
	</div>