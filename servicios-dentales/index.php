<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
	    <?php echo $seccion->metaTitle(5);?>
		
	</head>
	<body id="S_Servicios">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<section id="myCarousel2" class="carousel slide" data-ride="carousel" data-aos="zoom-out">
						<div class="carousel-inner" role="listbox">
						
								<?php
								$aux=0;
								$sql=mysql_query("SELECT * FROM SliderFoto WHERE idSeccion='5'");

								while($col=mysql_fetch_array($sql))
								{ 
									?>
									<div class="item <?php if($aux == 0) echo 'active';?>" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $col['NombreArchivo']; ?>)">
										<div class="flex animado fadeIn t-animated der">
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
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=9">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(31);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(31);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(31);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=10">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(32);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(32);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(32);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=11">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(33);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(33);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(33);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=12">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(34);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(34);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(34);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=13">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(35);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(35);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(35);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>

					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=14">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(36);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(36);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(36);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>
					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=18">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(37);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(37);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(37);?>
						<a href="<?php echo $ruta; ?>reservar">
							<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
						</a>
					</li>
					<li>
						<a href="<?php echo $ruta; ?>servicio/?idProductoCategoria=17">
							<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(48);?>)" class="img">
								<div class="flex">
									<div>
										<b><?php echo $seccion->obtenerTituloElemento(48);?></b>
									</div>
								</div>
							</div>
						</a>
						<hr>
						<?php echo $seccion->obtenerTextoElemento(48);?>
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