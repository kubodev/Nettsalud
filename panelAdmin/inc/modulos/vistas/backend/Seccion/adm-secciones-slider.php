<?php
$sql2 = mysql_query("SELECT * FROM SliderFoto where idSeccion = '".seguridad_sql($idSeccion)."' ORDER BY idSliderFoto ASC");
if(mysql_num_rows($sql2) > 0){ ?>

<section class="seccion">
	<h2 class="titulo_int">Slider</h2>
	<div class="contadm">
		<form onsubmit="javascript:cargadorOn()" method="post" style="width:100%; padding:0" enctype="multipart/form-data">
			<ul id="SliderFotos" class="row">
				<?php
				$contador = 0;
				$sql2 = mysql_query("SELECT * FROM SliderFoto where idSeccion = '".seguridad_sql($idSeccion)."' ORDER BY idSliderFoto ASC");
				while($col2 = mysql_fetch_array($sql2)){	
					$contador++;
					$primeraPos = 0;
					if($contador == 1){
						$primeraPos = 1;
						?>
						<input type="hidden" name="slider_desde" value="<?php echo $col2['idSliderFoto']; ?>">
						<?php
					}
					$dir=explode('inc',dirname(__FILE__));
					$idSliderFoto = $col2['idSliderFoto'];
					require($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-vistaItemSlider.php");
					$ultimoRegistro = $col2['idSliderFoto'];
				}
				?>
				<input type="hidden" name="envimg" value="1">
			</ul>
			<a href="javascript:agregarSliderFoto(<?php echo $idSeccion; ?>)" class="mini boton" value="Enviar" name="enviar">Agregar nueva foto</a>
			<input type="hidden" name="slider_hasta" value="<?php echo $ultimoRegistro; ?>">
		</form>
	</div>
</section>

<?php }