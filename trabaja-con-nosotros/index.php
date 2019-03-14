<?php 
	require_once("../inc/controlador.php");
?>
<!doctype html lang="es">
<html>
	<head>
	    <?php 
	    
	    require_once("../inc/modulos/vistas/estructura/cabecera.php");
	    
		
	    ?>		
	    <?php echo $seccion->metaTitle(6);?>
	</head>
	<body id="S_Trabaja">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<div class="flex a">
			<div class="animado t-animated fadeLeft">
				<?php echo $seccion->obtenerTexto(6);?>
				
				<form id="trabaja_con_nosotros">
					<hr>
					<input name="Nombre" type="text" placeholder="Nombre y Apellido:">
					<input name="RUT" type="text" placeholder="RUT:">
					<label>Adjunte su CV:</label>
					<input name="CV" type="file">
					<hr>
					<button>Enviar</button>
				</form>

			</div>
			<div class="animado t-animated fadeRight">
				<img src="<?php echo $ruta; ?>img/<?php echo $seccion->obtenerFotoElemento(38);?>">
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
	<?php require("../panelAdmin/inc/modulos/js/funciones_trabaja_con_nosotros.php"); ?>
</html>