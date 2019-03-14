<?php
$sql9 = mysql_query("SELECT * FROM SliderFoto where idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
$col2 = mysql_fetch_array($sql9);
?>

<li class="col-md-6" id="itemSlider<?php echo $idSliderFoto; ?>">
	<div class="admcontimg">
		<img src="<?php echo $Configuracion['Ruta']; ?>img/<?php echo $col2['NombreArchivo']; ?>">

		<div class="botonesEditar">
			<a href="javascript:abrirImgs(<?php echo $col2['idSliderFoto']; ?>)" data-toggle="tooltip" data-original-title="Editar"><span class="glyphicon glyphicon-pencil ed"></span></a>
			<?php if($primeraPos == 0) { ?><a href="javascript:borrarSliderFoto(<?php echo $idSliderFoto; ?>)" data-toggle="tooltip" data-original-title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a><?php } ?>
		</div>

		<div id="sl<?php echo $col2['idSliderFoto']; ?>" class="sliderInfoCont">
			<div class="lineaform"><label>Imagen:</label><input name="slider_img_<?php echo $col2['idSliderFoto']; ?>" type="file"/></div>
			<?php
			if($col2['TieneTitulo'] == 1){ ?>

				<div class="lineaform"><label>Título:</label><input name="slider_titulo_<?php echo $col2['idSliderFoto']; ?>" value="<?php echo $col2['Titulo']; ?>" type="text"/></div>
				<?php
				if(count($idiomas) > 1){
					// Sistema de idiomas
					for($posicion=1; $posicion<count($idiomas); $posicion++){
						// Parte desde el 1 así saltamos el español, que ya se declaró arriba
						?>

						<div class="lineaform"><label>Titulo [<?php echo $idiomas[$posicion]; ?>]:</label><input value="<?php echo $col2['Titulo_'.$idiomas[$posicion]]; ?>" class="titulo" name="slider_titulo_<?php echo $col2['idSliderFoto']; ?>_<?php echo $idiomas[$posicion]; ?>" maxlength="120" type="text"/></div>
				<?php }
				}
			}
			if($col2['TieneTexto'] == 1){ ?>
				<div class="lineaform"><label>Texto:</label><input name="slider_texto_<?php echo $col2['idSliderFoto']; ?>" value="<?php echo $col2['Texto']; ?>" type="text"/></div>
				<?php
				if(count($idiomas) > 1){
					// Sistema de idiomas
					for($posicion=1; $posicion<count($idiomas); $posicion++){
						// Parte desde el 1 así saltamos el español, que ya se declaró arriba
						?>

						<div class="lineaform"><label>Texto [<?php echo $idiomas[$posicion]; ?>]:</label><input value="<?php echo $col2['Texto_'.$idiomas[$posicion]]; ?>" class="titulo" name="slider_texto_<?php echo $col2['idSliderFoto']; ?>_<?php echo $idiomas[$posicion]; ?>" maxlength="120" type="text"/></div>
				<?php }
				}
			}
			if($col2['TieneBotonTitulo'] == 1){ ?>
				<div class="lineaform"><label>Botón:</label><input name="slider_botonTitulo_<?php echo $col2['idSliderFoto']; ?>" value="<?php echo $col2['BotonTitulo']; ?>" type="text"/></div>
				<?php
				if(count($idiomas) > 1){
					// Sistema de idiomas
					for($posicion=1; $posicion<count($idiomas); $posicion++){
						// Parte desde el 1 así saltamos el español, que ya se declaró arriba
						?>

						<div class="lineaform"><label>Botón [<?php echo $idiomas[$posicion]; ?>]:</label><input value="<?php echo $col2['BotonTitulo_'.$idiomas[$posicion]]; ?>" class="titulo" name="slider_botonTitulo_<?php echo $col2['idSliderFoto']; ?>_<?php echo $idiomas[$posicion]; ?>" maxlength="120" type="text"/></div>
				<?php }
				}
			}
			if($col2['TieneBotonUrl'] == 1){ ?>
				<div class="lineaform"><label>Enlace botón:</label><input name="slider_botonUrl_<?php echo $col2['idSliderFoto']; ?>" value="<?php echo $col2['BotonUrl']; ?>" type="text"/></div>
				<?php
				if(count($idiomas) > 1){
					// Sistema de idiomas
					for($posicion=1; $posicion<count($idiomas); $posicion++){
						// Parte desde el 1 así saltamos el español, que ya se declaró arriba
						?>

						<div class="lineaform"><label>Botón URL [<?php echo $idiomas[$posicion]; ?>]:</label><input value="<?php echo $col2['BotonUrl_'.$idiomas[$posicion]]; ?>" class="titulo" name="slider_botonUrl_<?php echo $col2['idSliderFoto']; ?>_<?php echo $idiomas[$posicion]; ?>" maxlength="120" type="text"/></div>
				<?php }
				}
			}
			?>
			<div class="lineaform"><button type="submit" class="mini boton" value="Enviar_s" name="enviar_slider">Actualizar</button></div>
		</div>
	</div>
</li>