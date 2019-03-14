<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Agregar album</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>galerias">Galerías</a></li>
			<li class="active">Agregar album</li>
		</ol>
	</section>

	
	<section class="seccion">
		<?php
		$dir=explode('inc',dirname(__FILE__));

		?>
		<form onsubmit="javascript:cargadorOn()" id="album-ag" method="post">
			<input type="hidden" name="idSeccion" value="<?php echo $_GET['idSeccion']; ?>">
			<div class="lineaform"><label>Nombre:</label><input name="Nombre" maxlength="200" type="text"/></div>
			<?php
			if(count($idiomas) > 1) // Sistema de idiomas

			{

				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

				echo'<div class="lineaform"><label>Nombre ['.$idiomas[$posicion].']:</label><input name="Nombre_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';

			}
			?>
			
			<div class="lineaform">

			<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>

			</div>

		</form>
		<?php require("../../inc/modulos/js/funciones_album-ag.php"); ?>
	</section>
		
	
</div>