<?php
$sql5 = mysql_query("SELECT * FROM Elemento WHERE idElemento = '".$idElemento."'");
$col2 = mysql_fetch_array($sql5);
?>
<li class="elemento" id="elemento<?php echo $idElemento; ?>">
	<a href="javascript:borrarElemento(<?php echo $idElemento; ?>)"><img align="right" src="<?php echo $ruta; ?>img/borrar.gif"></a>
	<?php
	if($col2['TieneTitulo'] == 1){ ?>

		<div class="lineaform"><label>Titulo:</label><input value="<?php echo seguridad_php($col2['Titulo']); ?>" name="Titulo_e_<?php echo $idElemento; ?>" maxlength="120" type="text"/></div>
		<?php
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			echo'<div class="lineaform"><label>Titulo ['.$idiomas[$posicion].']:</label><input value="'.seguridad_php($col2['Titulo_'.$idiomas[$posicion]]).'" name="Titulo_e_'.$idElemento.'_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';
			?>
			<?php
		}
	}
	if($col2['TieneSubTitulo'] == 1){ ?>

		<div class="lineaform"><label>SubTitulo:</label><input value="<?php echo seguridad_php($col2['SubTitulo']); ?>" name="SubTitulo_e_<?php echo $idElemento; ?>" maxlength="120" type="text"/></div>
		<?php
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			echo'<div class="lineaform"><label>SubTitulo ['.$idiomas[$posicion].']:</label><input value="'.seguridad_php($col2['SubTitulo_'.$idiomas[$posicion]]).'" name="SubTitulo_e_'.$idElemento.'_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';
			?>
			<?php
		}
	}
	if($col2['TieneLink'] == 1){ ?>

		<div class="lineaform"><label>Link:</label><input value="<?php echo seguridad_php($col2['Link']); ?>" name="Link_e_<?php echo $idElemento; ?>" maxlength="120" type="text"/></div>
		<?php
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			echo'<div class="lineaform"><label>Link ['.$idiomas[$posicion].']:</label><input value="'.seguridad_php($col2['Link_'.$idiomas[$posicion]]).'" name="Link_e_'.$idElemento.'_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';
			?>
			<?php
		}
	}
	if(strlen($col2['FotoNombreArchivo'])){ ?>
	
		<div class="lineaform"><label>Archivo:</label>
			<div class="row">
				<div class="col-md-6">
					<div class="fotoMinEdicion">
						<?php if(esImagen($col2['FotoNombreArchivo'])) {?><img src="<?php echo $Configuracion['Ruta'];?>img/<?php echo $col2['FotoNombreArchivo']; ?>"><?php } else { ?><img class="documento" src="<?php echo $ruta;?>img/file.jpg"> <?php } ?>
					</div>
					<input name="FotoNombreArchivo_<?php echo $idElemento; ?>" type="file"/>
				</div>
			</div>
		</div>
		<?php
	}
	if($col2['TieneTexto'] == 1){ ?>

		<div class="lineaform"><label>Contenido:</label><div class="clear"></div><textarea name="Texto_e_<?php echo $idElemento; ?>"><?php echo $col2['Texto']; ?></textarea></div>
		<?php
		if(count($idiomas) > 1){
			// Sistema de idiomas

			for($posicion=1; $posicion<count($idiomas); $posicion++)
			{ // Parte desde el 1 así saltamos el español, que ya se declaró arriba
				echo'<div class="lineaform"><label>Contenido ['.$idiomas[$posicion].']:</label><div class="clear"></div><textarea name="Texto_e_'.$idElemento.'_'.$idiomas[$posicion].'">'.$col2['Texto_'.$idiomas[$posicion]].'</textarea></div>';
				?>
				<script>cargarEditor('textarea[name="Texto_e_<?php echo $idElemento; ?>_<?php echo $idiomas[$posicion]; ?>"]');</script>
				<?php
			}
		}
		?>
		<script>
			cargarEditor('textarea[name="Texto_e_<?php echo $idElemento; ?>"]');			
		</script>
		<?php
	}
	?>
</li>