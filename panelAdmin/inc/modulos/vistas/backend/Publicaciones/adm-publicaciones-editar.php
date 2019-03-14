<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Editar publicación</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>publicaciones">Publicaciones</a></li>
			<li class="active">Editar</li>
		</ol>
	</section>

	
	<section class="seccion">
		<?php
		$dir=explode('inc',dirname(__FILE__));
		$idPublicacion = $_GET['idPublicacion'];
		/* Scripts para envío de formulario */
		require_once($dir[0].'inc/modulos/php/scripts/publicaciones/editar.php');
		/* Fin Scripts para envío de formulario */
		?>
		<form onsubmit="javascript:cargadorOn()" method="post" action="" enctype="multipart/form-data">

			<div class="lineaform"><label>Titulo:</label><input name="Titulo" value="<?php echo $Publicacion->obtenerAtributo('Titulo',$idPublicacion); ?>" maxlength="200" type="text"/></div>
			<?php
			if(count($idiomas) > 1) // Sistema de idiomas

			{

				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

				echo'<div class="lineaform"><label>Titulo ['.$idiomas[$posicion].']:</label><input value="'.$Publicacion->obtenerAtributo('Titulo_'.$idiomas[$posicion],$idPublicacion).'" name="Titulo_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';

			}
			?>
			<div class="lineaform">

				<label>Etiqueta:</label>

				<select name="idPublicacionCategoria">

				<?php
					$sql2 = mysql_query("SELECT * FROM PublicacionCategoria");
					while($col2 = mysql_fetch_array($sql2))

					{

						echo '<option value="'.$col2['idPublicacionCategoria'].'"'; 
						if($Publicacion->obtenerAtributo('idPublicacionCategoria',$idPublicacion) == $col2['idPublicacionCategoria']) echo ' selected';
						echo'>'.$col2['Nombre'].'</option>';

					}
				?>
				</select>

			</div>

			<div class="lineaform"><label>Imagen:</label><input name="NombreArchivo" type="file"/></div>

			<div class="lineaform"><label>Contenido:<br /><br /></label><textarea name="Texto"><?php echo $Publicacion->obtenerAtributo('Texto',$idPublicacion); ?></textarea></div>

			<?php

			if(count($idiomas) > 1) // Sistema de idiomas

			{

				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

				echo'<div class="lineaform"><label>Contenido ['.$idiomas[$posicion].']: <br /><br /></label><div class="clear"></div><textarea name="Texto_'.$idiomas[$posicion].'">'.$Publicacion->obtenerAtributo('Texto_'.$idiomas[$posicion],$idPublicacion).'</textarea></div>';

				?>
				<script>cargarEditor('textarea[name="Texto_<?php echo $idiomas[$posicion]; ?>"]');</script>
				<?php

			}

			?>

			<div class="lineaform">

			<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>

			</div>

		</form>
	</section>
	<script>
		 $( document ).ready(function() {cargarEditor('textarea[name="Texto"]');});
	 </script>
		
	
</div>