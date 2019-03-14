<title>Gestor de Productos | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Gestor de Productos</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="#">Gestor de Productos</a></li>
				<li class="active">Agregar</li>
			</ol>
		</section>
		<section class="seccion">
			<p>Descargue la plantilla, llénela con datos y vuelva a subirla.<br><br>Las fotos deben ser subidas en formato .png, .jpg, .jpeg y el nombre de cada foto debe contener el código SKU del producto, seguido de un guión y el número de foto, por ejemplo: 6945948-1.png - 6945948-2.jpeg . Antes de agregar las fotos, debes subir los productos en su planilla.<br><br>Si lo que desea es <b>agregar nuevos productos</b> descargue la plantilla vacía. Si lo que desea es <b>editar o actualizar productos ya existentes</b> descargue la plantilla con productos.</p>
			<br><br>
			<a href="<?php echo $ruta; ?>inc/modulos/js/loads/Producto/Masivo_agregar_DescargarPlantilla.php"><button class="mini boton">DESCARGAR PLANTILLA VACÍA</button></a>
			<a href="<?php echo $ruta; ?>inc/modulos/js/loads/Producto/Masivo_agregar_DescargarPlantillaLlena.php"><button class="mini boton">DESCARGAR PLANTILLA CON PRODUCTOS</button></a>
			<br><br><br><br>

			<form id="formProductos">
				<div class="lineaform">
					<label>Importación de planilla:</label>
					<input type="file" name="planilla">
				</div>
				<div class="lineaform">
					<button class="boton">ENVIAR</button>
				</div>
			</form>
				<div id="cargador_php_form"></div>
				<?php 

				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoMasivo_agregar.php"); ?>
		</section>
	</div>