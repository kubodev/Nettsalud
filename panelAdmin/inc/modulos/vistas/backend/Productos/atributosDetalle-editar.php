<title>Atributos de Producto | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Atributos de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/atributos">Atributos de Producto</a></li>
				<li class="active">Editar detalle</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Detalle de Atributo:</label><input name="nombre" placeholder="ej: Verde" maxlength="120" value="<?php echo $Producto->nombreAtributoDetalle($_GET['idProductoAtributoDetalle']) ?>" type="text" required/></div>
					<input type="hidden" name="idProductoAtributoDetalle" value="<?php echo $_GET['idProductoAtributoDetalle']; ?>">
					<div class="lineaform">
						<a href="../elimDetalle/?idProductoAtributoDetalle=<?php echo $_GET['idProductoAtributoDetalle']; ?>" class="eliminar boton">Eliminar</a>
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoAtributoDetalle_editar.php"); ?>
		</section>
	</div>