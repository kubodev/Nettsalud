<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
	   	<title>Blog</title>
		
	</head>
	<body id="S_Blog">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
		<div id="Blog">
			<div class="container">
	  			<h2>Blog</h2>
	  			<ul class="noticias">
					<?php
					$sql = mysql_query("SELECT * FROM Publicacion ORDER BY idPublicacion DESC");
					while($col = mysql_fetch_array($sql))
					{
						?>
						<li class="animado bounceIn t-animated">
							<a href="<?php echo $ruta; ?>publicacion/?idPublicacion=<?php echo $col['idPublicacion']; ?>">
									<div class="img" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $col['NombreArchivo']; ?>)">
										<div class="int">
											<div>
												<div class="titulo"><?php echo $col['Titulo']; ?></div>
												<p>
													<?php echo $Publicacion->obtenerTexto($col['idPublicacion'],100); ?>
												</p>
											</div>
											<div>
												<img src="<?php echo $ruta; ?>img/mas.png">
											</div>
										</div>
									</div>
									

								
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	    <!-- ./ Contenido -->
	    <?php require_once("../inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("../inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
</html>