<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
	    <?php echo $seccion->metaTitle(7);?>
		
	</head>
	<body id="S_Convenios">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<section id="myCarousel2" class="carousel slide" data-ride="carousel" data-aos="zoom-out">
						<div class="carousel-inner" role="listbox">
						
								<?php
								$aux=0;
								$sql=mysql_query("SELECT * FROM SliderFoto WHERE idSeccion='7'");

								while($col=mysql_fetch_array($sql))
								{ 
									?>
									<div class="item <?php if($aux == 0) echo 'active';?>" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $col['NombreArchivo']; ?>)">
										<div class="flex animado fadeIn t-animated der">
											<div class="caption">
												<hr>
												<?php echo $col['Titulo']; ?>
												
												<b>
												<?php echo $col['Texto']; ?>
												</b>
												
												<?php echo $col['BotonTitulo']; ?>
												<hr class="animado t-animated fadeDown">
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
		

		<div id="Convenios">
			<div class="container hoja">
				<h2><?php echo $seccion->obtenerTitulo(7);?></h2>
				<ul>
					<?php
								$aux=0;
								foreach($seccion->GrupoElementos(2) as $idElemento)
								{ 
									?>
									<li>
										<div class="img" style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento($idElemento);?>)"></div>
										<hr>
										<span><?php echo $seccion->obtenerTituloElemento($idElemento);?></span>
										<b><?php echo $seccion->obtenerSubTituloElemento($idElemento);?></b>

									</li>
									<?php
								}
								?>
				</ul>
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