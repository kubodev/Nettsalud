<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php");?>
		<?php echo $seccion->metaTitle(3);?>
	</head>
	<body id="S_Nosotros">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
	    <section id="myCarousel2" class="carousel slide" data-ride="carousel" data-aos="zoom-out">
						<div class="carousel-inner" role="listbox">
						
								<?php
								$aux=0;
								$sql=mysql_query("SELECT * FROM SliderFoto WHERE idSeccion='3'");

								while($col=mysql_fetch_array($sql))
								{ 
									?>
									<div class="item <?php if($aux==0) echo 'active';?>" style="background-image: url(../img/<?php echo $col['NombreArchivo']; ?>)">
										
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
		<!--<div class="bgNosotros" style="background-image: url(../img/<?php echo $seccion->obtenerFotoElemento(13);?>)">-->
			
		</div>
		<div class="hoja container">
			<h2><?php echo $seccion->obtenerTituloElemento(14);?></h2>
			<?php echo $seccion->obtenerTextoElemento(14);?>
			<div class="clear" style="height:50px"></div>
			<h2><?php echo $seccion->obtenerTituloElemento(15);?></h2>
			<?php echo $seccion->obtenerTextoElemento(15);?>
			<div class="clear" style="height:50px"></div>
			<h2><?php echo $seccion->obtenerTituloElemento(16);?></h2>
			<?php echo $seccion->obtenerTextoElemento(16);?>
			<div class="clear" style="height:50px"></div>
			<h2><?php echo $seccion->obtenerTituloElemento(17);?></h2>
			<?php echo $seccion->obtenerTextoElemento(17);?>
		</div>
		<div class="Gris">
			<div class="container">
				<h2>Equipo profesional</h2>
				<ul class="equipo">
					<?php
					foreach($CategoriaProductos->obtenerProductos() as $idProducto)
					{ 
						?>
						<li>
							<div class="img" style="background-image: url(../panelAdmin/img/Productos/<?php echo $Producto->obtenerFotos($idProducto)[0];?>)"></div>
							<b><?php echo $Producto->obtenerInformacion($idProducto)['Nombre']; ?></b>
							<span><?php echo $CategoriaProductos->obtenerNombre($Producto->arrayCategorias($idProducto)[0]); ?></span>
							<hr>
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
