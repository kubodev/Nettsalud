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
	<body id="S_Contacto">
	    <?php require_once("../inc/modulos/vistas/estructura/header.php");
		?>
	    <!-- Contenido -->
		<div id="Contacto">
			<div class="container">
				<div class="flex">
					<div>
						<h2>Centro Médico y Dental NettSalud</h2>
						<hr>
						<ul>
							<li>
								<div>
									<img src="<?php echo $ruta; ?>img/tel.png"> 
								</div>
								<div>
									<a href="tel:<?php echo $Informacion['Telefono']; ?>"><?php echo $Informacion['Telefono']; ?></a>
								</div>
							</li>
							<li>
								<div>
									<img src="<?php echo $ruta; ?>img/dir.png"> 
								</div>
								<div>
									<?php echo $Informacion['Direccion']; ?>
								</div>
							</li>
						</ul>
						<hr>
						<div class="Horarios">
							<b><?php echo $seccion->obtenerTituloElemento(1);?></b>
							<div class="hora">
								<span><?php echo $seccion->obtenerTituloElemento(2);?></span>
								<span><?php echo $seccion->obtenerSubTituloElemento(2);?></span>
							</div>
							<div class="hora">
								<span><?php echo $seccion->obtenerTituloElemento(3);?></span>
								<span><?php echo $seccion->obtenerSubTituloElemento(3);?></span>
							</div>
							<div class="hora">
								<span><?php echo $seccion->obtenerTituloElemento(4);?></span>
								<span><?php echo $seccion->obtenerSubTituloElemento(4);?></span>
							</div>
						</div>
					</div>
					<div>
						<form id="contacto">
							<input placeholder="Nombre:" name="Nombre" type="text" required>
							<input placeholder="Teléfono:" name="Telefono" type="text" required>
							<input placeholder="E-mail:" type="email" name="Email" required>
							<select name="Especialidad" required>
								<option disabled selected>-- Seleccione especialidad</option>
								<?php
								$sql = mysql_query("SELECT * FROM ProductoCategoria ORDER BY nombre ASC");
								while($col = mysql_fetch_array($sql))
								{
									if(!$CategoriaProductos->tieneHijos($col['idProductoCategoria']))
									{
										?>
										<option value="<?php echo $col['idProductoCategoria']; ?>"><?php echo $col['nombre']; ?></option>
										<?php
									}
								}
								?>
								<option>Otra</option>
							</select>
							<select name="Especialista" disabled required>
								<option selected disabled>-- Seleccione especialista --</option>
							</select>
							<div class="fecha">
								<div>
									<label>Día:</label>
									<input format="dd/mm/yyyy" type="date" name="Fecha" required>
								</div>
								<div>
									<label>Hora:</label>
									<input placeholder="ej: 09:00" type="text" name="Hora" required>
								</div>
							</div>
							<textarea placeholder="Opcional: Comentarios" name="Comentarios"></textarea>
							<button>Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9290.194288327604!2d-70.99152574661595!3d-34.589500251247635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96649016bf2ac3b3%3A0x7a11331a914d50b8!2sAv.+Bernardo+O&#39;Higgins+450%2C+San+Fernando%2C+Regi%C3%B3n+del+Libertador+Gral.+Bernardo+O%E2%80%99Higgins!5e0!3m2!1ses!2scl!4v1546032590820" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	    <!-- ./ Contenido -->
	    <?php require_once("../inc/modulos/vistas/estructura/footer.php");?>
	</body>


	<!-- Ficheros externos -->
	<?php require("../inc/modulos/vistas/estructura/ficherosExternos.php"); ?>
	<?php require("../panelAdmin/inc/modulos/js/funciones_reservar.php"); ?>
</html>