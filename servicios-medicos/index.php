<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
	    <?php echo $seccion->metaTitle(4);?>
		
	</head>
	<body id="S_Servicios">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<section id="myCarousel2" class="carousel slide" data-ride="carousel" data-aos="zoom-out">
						<div class="carousel-inner" role="listbox">
						
								<?php
								$aux=0;
								$sql=mysql_query("SELECT * FROM SliderFoto WHERE idSeccion='4'");

								while($col=mysql_fetch_array($sql))
								{ 
									?>
									<div class="item <?php if($aux == 0) echo 'active';?>" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $col['NombreArchivo']; ?>)">
										<div class="flex animado fadeIn t-animated">
											<div class="caption">
												<h2 class="animado t-animated fadeDown"><?php echo $col['Titulo']; ?></h2>
												<hr>
												<p class="animado t-animated fadeDown">
												<?php echo $col['Texto']; ?>
												</p>
												<hr class="animado t-animated fadeDown">
												<a class="lineas animado t-animated fadeDown hvr-bounce-in" href="<?php echo $ruta.$col['BotonUrl']; ?>"><?php echo $col['BotonTitulo']; ?></a>
											</div>

										</div>
									</div>
									<?php
									$aux++;
								}
								?>
						</div>
						<div href="#myCarousel2" class="left carousel-control" data-slide="prev">
				            <span>
				                <img src="<?php echo $ruta; ?>img/flecha_izq.png" />
				            </span>
				        </div>
				        <div href="#myCarousel2" class="right carousel-control" data-slide="next">
				            <span>
				                <img src="<?php echo $ruta; ?>img/flecha_der.png" />
				            </span>
				        </div>
					</section>
		

		<div id="Servicios">
			<div class="container">
				<ul>
					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProducto=2">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(25);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(25);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(25);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=3">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(26);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(26);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(26);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=4">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(27);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(27);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(27);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=5">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(28);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(28);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(28);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=6">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(29);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(29);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(29);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=7">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(30);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(30);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(30);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>
					<li>
						<a href="#">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(47);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(47);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(47);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>
					
				</ul>
			</div>
		</div>
		
		
	    <!-- ./ Contenido -->
	    <?php require_once("../inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("../inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
</html>