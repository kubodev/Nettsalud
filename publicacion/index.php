<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
	    <?php
		$idPublicacion = $_GET['idPublicacion'];
		?>
		<?php echo $Publicacion->metaTitle($idPublicacion);?>
	</head>
	<body id="S_Blog">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		
		<div id="Blog">
			<h2>Blog</h2>
			<div class="container blog">
				<div class="flex a">
					<div id="izq">
						
						<div class="img" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $Publicacion->obtenerFoto($idPublicacion); ?>)"></div>
						
						<div class="rrss" style="padding:20px; text-align: center">
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.1';
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-share-button" data-href="http://oficinaglobal.cl/publicacion/?idPublicacion=<?php echo $idPublicacion; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Foficinaglobal.cl%2Fpublicacion%2F?idPublicacion=<?php echo $idPublicacion; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
							<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: es_ES</script>
							<script type="IN/Share"></script>
						</div>
						<h1><?php echo $Publicacion->obtenerTitulo($idPublicacion); ?></h1>
						<div style="text-align:justify;font-size:16px"><?php echo $Publicacion->obtenerAtributo('Texto',$idPublicacion); ?></div>
									
									



					</div>
					
				</div>
			</div>
		</div>
		<div id="Blog" class="rel">
			<div class="container">
				<h2>Más noticias relacionadas</h2>
				<ul class="noticias">
					<?php
					$sql = mysql_query("SELECT * FROM Publicacion WHERE idPublicacionCategoria = '".$Publicacion->obtenerAtributo('idPublicacionCategoria',$idPublicacion)."' ORDER BY idPublicacion DESC");
					while($col = mysql_fetch_array($sql))
					{
						?>
						<li class="animado bounceIn t-animated">
							<a href="<?php echo $ruta; ?>publicacion/?idPublicacion=<?php echo $col['idPublicacion']; ?>">
								<div class="img" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $col['NombreArchivo']; ?>)"></div>
									<div class="int">
										<div class="titulo"><?php echo $col['Titulo']; ?></div>
										<p>
											<?php echo $Publicacion->obtenerTexto($col['idPublicacion'],100); ?>
										</p>
									</div>
									

								
							</a>
						</li>
						<?php
					}
					?>
				</ul>
				<a href="../blog"><button>Ver todos</button></a>
			</div>
		</div>
		<div id="Boxes">
			<div class="container">
				<div class="flex">
					<div class="box animado fadeLeft">
						<div>
							<b>¿Necesitas un tratamiento?</b>
							<span>Agenda una hora</span>
						</div>
						<div>
							<ul>
								
								<li>
									<a href="<?php echo $ruta; ?>reservar">
										<span>Reservar hora</span>
										<img src="<?php echo $ruta; ?>img/mas.png">
									</a>
								</li>
								<li>
									<a href="<?php echo $ruta; ?>anular">
										<span>Anular hora</span>
										<img src="<?php echo $ruta; ?>img/anular.png">
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="box animado fadeLeft">
						<div>
							<b>¿Quieres seguir en contacto?</b>
							<span>Siguenos en nuestras redes</span>
						</div>
						<div>
							<ul>
								
								<li>
									<a href="<?php echo $Informacion['Link FB']; ?>">
										
										<img src="<?php echo $ruta; ?>img/fb.png">
										<span>Nett Salud</span>
									</a>
								</li>
								<li>
									<a href="<?php echo $Informacion['Link IN']; ?>">
										<img src="<?php echo $ruta; ?>img/in.png">
										<span>@Nettsalud</span>
										
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	    <!-- ./ Contenido -->
	    <?php require_once("../inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("../inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
</html>