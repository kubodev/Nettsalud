<?php 
	require_once("inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("inc/modulos/vistas/estructura/cabecera.php");?>
	    <?php echo $seccion->metaTitle(1);?>
		
	</head>
	<body id="S_Inicio">
	    <?php require_once("inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<section id="myCarousel2" class="carousel slide" data-ride="carousel" data-aos="zoom-out">
						<div class="carousel-inner" role="listbox">
						
								<?php
								$aux=0;
								$sql=mysql_query("SELECT * FROM SliderFoto WHERE idSeccion='1'");

								while($col=mysql_fetch_array($sql))
								{ 
									?>
									<div class="item <?php if($col['idSliderFoto']==1) echo 'active';?>" style="background-image: url(img/<?php echo $col['NombreArchivo']; ?>)">
										<div class="flex animado fadeIn t-animated">
											<div class="caption t-animated fadeRight animado">
												<h2 class="animado t-animated fadeDown"><?php echo $col['Titulo']; ?></h2>
												<hr class="animado t-animated fadeDown">
												<p class="animado t-animated fadeDown">
												<?php echo $col['Texto']; ?>
												</p>
												<hr class="animado t-animated fadeDown">
												<a class="lineas animado t-animated fadeDown hvr-bounce-in" href="<?php echo $col['BotonUrl']; ?>"><?php echo $col['BotonTitulo']; ?></a>
											</div>

										</div>
									</div>
									<?php
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
		<div class="container">
			<div id="BajoSlider">
				<div class="animado t-animated fadeLeft">
					<b><?php echo $seccion->obtenerTituloElemento(1);?></b>
					<div class="hora">
						<span><?php echo $seccion->obtenerTituloElemento(2);?></span>
						<span><?php echo $seccion->obtenerSubTituloElemento(2);?></span>
					</div>
					<div class="hora">
						<span><?php echo $seccion->obtenerTituloElemento(3);?></span>
						<span><?php echo $seccion->obtenerSubTituloElemento(3);?></span>
					</div>
				</div>
				<div class="animado t-animated fadeRight">
					<a href="<?php echo $ruta; ?>reservar">
						<button><img src="<?php echo $ruta; ?>img/reloj.png"> Reservar hora</button>
					</a>
					<a href="<?php echo $ruta; ?>anular">
						<button><img src="<?php echo $ruta; ?>img/anular.png"> Anular hora</button>
					</a>
				</div>
			</div>	
		</div>
		<div id="Servicios">
			<div class="container">
				<h2 class="animado fadeIn">Servicios</h2>
				<ul>
					<li  class="animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(5);?>">
							<img src="<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(5);?>">
							<h3><?php echo $seccion->obtenerTituloElemento(5);?></h3>
						</a>
					</li>
					<li class="animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(6);?>">
							<img src="<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(6);?>">
							<h3><?php echo $seccion->obtenerTituloElemento(6);?></h3>
						</a>
					</li>
					<li class="animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(7);?>">
							<img src="<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(7);?>?">
							<h3><?php echo $seccion->obtenerTituloElemento(7);?></h3>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="Personalizada">
			<div class="flex">
				<div class="animado fadeLeft">
					<h2><?php echo $seccion->obtenerTituloElemento(9);?></h2>
					<hr>
					<?php echo $seccion->obtenerTextoElemento(9);?>
					<hr>
					<a href="<?php echo $ruta; ?>reservar"><button>Reserva tu hora</button></a>
				</div>
				<div style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(9);?>)" class="animado fadeRight">

				</div>
			</div>
		</div>
		<!--<div id="Servicios">
			<div class="container">
				<ul class="b">
					<li style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(10);?>)" class="img animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(10);?>">
							<div class="flex">
								<div>
									<b><?php echo $seccion->obtenerTituloElemento(10);?></b>
									<span><?php echo $seccion->obtenerSubTituloElemento(10);?></span>
								</div>
								<div>
									<img src="<?php echo $ruta; ?>img/mas.png">
								</div>
							</div>
						</a>
					</li>
					<li style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(11);?>)" class="img animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(11);?>">
							<div class="flex">
								<div>
									<b><?php echo $seccion->obtenerTituloElemento(11);?></b>
									<span><?php echo $seccion->obtenerSubTituloElemento(11);?></span>
								</div>
								<div>
									<img src="<?php echo $ruta; ?>img/mas.png">
								</div>
							</div>
						</a>
					</li>
					<li style="background-image: url(<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(12);?>)" class="img animado bounceIn">
						<a href="<?php echo $seccion->obtenerLinkElemento(12);?>">
							<div class="flex">
								<div>
									<b><?php echo $seccion->obtenerTituloElemento(12);?></b>
									<span><?php echo $seccion->obtenerSubTituloElemento(12);?></span>
								</div>
								<div>
									<img src="<?php echo $ruta; ?>img/mas.png">
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>-->
		<div id="Blog">
			<div class="container">
				<h2 class="animado fadeIn">Blog</h2>
				<ul class="noticias">
					<?php
					$sql = mysql_query("SELECT * FROM Publicacion ORDER BY idPublicacion DESC limit 4");
					while($col = mysql_fetch_array($sql))
					{
						?>
						<li class="animado bounceIn">
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
				<a href="blog" class="animado fadeIn"><button>Ver todos</button></a>
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
		<?php 
		if($Informacion['Activar PopUp (si o no)'] == 'si')
		{

			?>
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			    	  <img src="img/<?php echo $seccion->obtenerFotoElemento(45);?>">
			    </div>
			  </div>
			</div>
			<?php
		}
		?>
	    <!-- ./ Contenido -->
	    <?php require_once("inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
	<script type="text/javascript">

						$(document).ready(function() {
							setTimeout(function(){ 
							<?php 
							if($Informacion['Activar PopUp (si o no)'] == 'si')
							{

								?>
								$("#exampleModalLong").modal("show");
								<?php 
							}
							?>
						},2000);

						});

					</script>
</html>