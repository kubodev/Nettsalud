<?php 
	require_once("inc/controlador.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	    <?php require_once("inc/modulos/vistas/estructura/cabecera.php"); ?>
	    <script> var nave1 = 0; </script>
	</head>
	<body>
		<?php require_once("inc/modulos/vistas/estructura/header.php"); ?>
		<!-- Contenido -->
		<article>
			<div class="container" style="min-height: 400px;">
				<div class="row" style="position:relative">
					<div class="col-md-3">
						<?php require_once("inc/modulos/vistas/estructura/sidebar.php"); ?>
					</div>
					<div class="col-md-9">
						<section class="seccion">
							<h1 class="titulo">Bienvenido</h1>
							<ol class="breadcrumb">
								<li class="active">Panel de administración</li>
							</ol>
						</section>

						<section class="seccion">
							<p><b>¡Bienvenido al panel de administración de su sitio web!</b> En el menu del lateral izquierdo podrá encontrar todas las herramientas disponibles. No olvide que cualquier cambio guardado será irrevocable. Se recomienda realizar los cambios de acorde al manual administrativo.</p>
						</section>

					</div>
				</div>
			</div>
		</article>
		<!-- ./ Contenido -->
		<?php require_once("inc/modulos/vistas/estructura/footer.php"); ?>
	</body>

</html>