<?php 
	require_once("../../../inc/controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	    <?php require_once("../../../inc/modulos/vistas/estructura/cabecera.php"); ?>
	</head>
	<body>
		<?php require_once("../../../inc/modulos/vistas/estructura/header.php"); ?>
		<!-- Contenido -->
		<article>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php require_once("../../../inc/modulos/vistas/estructura/sidebar.php"); ?>
					</div>
					<?php require_once("../../../inc/modulos/vistas/backend/Publicaciones/categorias-agregar.php");?>
				</div>
			</div>
		</article>
		<!-- ./ Contenido -->
		<?php require_once("../../../inc/modulos/vistas/estructura/footer.php"); ?>
	</body>

</html>