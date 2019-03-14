<section class="seccion">
	<h2 class="titulo_int">Contenido principal</h2>

	<div class="contadm">		
		<div class="lineaform"><label>Titulo:</label><input value="<?php echo $seccion->obtenerAtributo('Titulo',$idSeccion); ?>" name="Titulo" maxlength="120" type="text"/></div>
		<?php
		if(count($idiomas) > 1){
			// Sistema de idiomas
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			echo'<div class="lineaform"><label>Titulo ['.$idiomas[$posicion].']:</label><input id="titulo" value="'.$seccion->obtenerAtributo('Titulo_'.$idiomas[$posicion],$idSeccion).'" name="Titulo_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';
		}

		if($seccion->obtenerAtributo('TieneTexto',$idSeccion) == 1){ ?>
			<div class="lineaform"><label>Contenido:</label><div class="clear"></div><textarea id="edit" name="Texto"><?php echo $seccion->obtenerAtributo('Texto',$idSeccion); ?></textarea></div>			
			<?php
			if(count($idiomas) > 1){
				// Sistema de idiomas
				for($posicion=1; $posicion<count($idiomas); $posicion++)
				{
					// Parte desde el 1 así saltamos el español, que ya se declaró arriba
					echo'<div class="lineaform"><label>Contenido ['.$idiomas[$posicion].']:</label><div class="clear"></div><textarea name="Texto_'.$idiomas[$posicion].'">'.$seccion->obtenerAtributo('Texto_'.$idiomas[$posicion],$idSeccion).'</textarea></div>';
					?>
					<script>cargarEditor('textarea[name="Texto_<?php echo $idiomas[$posicion]; ?>"]');</script>
					<?php
				}
			}
		}
		?>

		<button type="submit" class="submit boton" value="Enviar" name="infoSeccion">Guardar cambios</button>
	</div>
</section>

<script>
	$( document ).ready(function() {cargarEditor('textarea[name="Texto"]');});
</script>