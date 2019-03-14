<?php 
	$permiteAcceso=1;
	require_once("../inc/controlador.php");
	if($_SESSION['idUsuariosAdmin']){
		redirect("../");
	}else{ ?>
<!DOCTYPE html>
<html lang="es">
	<head>
	    <?php require_once("../inc/modulos/vistas/estructura/cabecera.php"); ?>
	</head>
	<body>
		<?php require_once("../inc/modulos/vistas/estructura/header.php"); ?>
		<!-- Contenido -->
		<article>
			<div class="container">
				<form id="loginAdmin" class="col-md-4">
					<h1>Iniciar sesión</h1>
					<div class="lineaform">
						<label>Usuario</label>
						<input type="text" name="Usuario" required>
					</div>
					<div class="lineaform">
						<label>Contraseña</label>
						<input type="password" name="Contrasena" required>
					</div>
					<input type="submit" name="enviar" value="Entrar" class="boton">
				</form>
				<?php require_once("../inc/modulos/js/funciones_loginAdmin.php"); ?>
			</div>
		</article>
		<!-- ./ Contenido -->
		<?php require_once("../inc/modulos/vistas/estructura/footer.php"); ?>
	</body>

</html>
<?php } ?>