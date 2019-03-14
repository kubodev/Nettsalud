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
			<p>Las fotos deben ser subidas en formato .png, .jpg, .jpeg y el nombre de cada foto debe contener el código SKU del producto, seguido de un guión y el número de foto, por ejemplo: 6945948-1.png - 6945948-2.jpeg . También será valido subir fotos sólo con el SKU y sin guión, por ejemplo: 6945948.png . Antes de agregar las fotos, los productos ya deben estar en la base de datos.<br><br>
			Considera que mientras más fotos sean (y más pesen) el sistema más se demorará. Si subes contenido sobre 100 MB, sería normal que el sistema cargue durante varios minutos.</p>
			<br><br><br><br>
			<div class="contador" style="display:none"><span id="a">0</span>/<span id="b"></span> fotos procesadas</div>
			<form id="formProductos">
				<div class="lineaform">
					<label>Subida de fotos:</label>
					<input type="file" id="fotos" name="fotos[]" multiple>
				</div>
				<div class="lineaform">
					<button class="boton">ENVIAR</button>
				</div>
			</form>
				<div id="cargador_php_form"></div>
		</section>
	</div>
	<?php 

				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoMasivo_fotos.php"); ?>