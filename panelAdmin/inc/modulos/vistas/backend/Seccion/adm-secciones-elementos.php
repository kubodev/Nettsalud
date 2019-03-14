<?php
	$sql2 = mysql_query("SELECT * FROM Elemento WHERE idSeccion = '".$idSeccion."'");
	if(mysql_num_rows($sql2) > 0){ ?>
	<section class="seccion">
		<h2 class="titulo_int">Elementos</h2>
		<div class="contadm">
	<?php }

	$sql3 = mysql_query("SELECT * FROM Elemento WHERE idSeccion = '$idSeccion' AND idElementoGrupo IS NULL");
	if(mysql_num_rows($sql3) > 0){
		while($col3 = mysql_fetch_array($sql3)){ 
			$dir=explode('inc',dirname(__FILE__));
			$idElemento = $col3['idElemento'];
			require($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-vistaElemento.php");
		} 
	} 

	$dir=explode('inc',dirname(__FILE__));
	$sql = mysql_query("SELECT * FROM ElementoGrupo WHERE idSeccion = '".$idSeccion."'");
	if(mysql_num_rows($sql) > 0){
		while($col = mysql_fetch_array($sql)){ ?>

			<ul class="elementoGrupo" id="elementoGrupo<?php echo $col['idElementoGrupo']; ?>">
				<h2 class="titulo_int"><?php echo $col['Identificador']; ?></h2>
				<?php
				$sql9 = mysql_query("SELECT * FROM Elemento WHERE idElementoGrupo = '".$col['idElementoGrupo']."'");
				if(mysql_num_rows($sql2) > 0){
					while($col2 = mysql_fetch_array($sql9)){
						$idElemento = $col2['idElemento'];
						require($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-vistaElementoGrupo.php");
					}
				} ?>

				<a href="javascript:agregarElemento(<?php echo $col['idElementoGrupo']; ?>)" style="margin-left:10px" class="mini boton" value="Enviar" name="enviar">Agregar elemento en '<?php echo $col['Identificador']; ?>'</a>
			</ul>
			<?php
		}
	}
	$sql2 = mysql_query("SELECT * FROM Elemento WHERE idSeccion = '".$idSeccion."'");
	if(mysql_num_rows($sql2) > 0){ ?>
			<button type="submit" class="submit boton" value="Enviar" name="elementos">Guardar cambios</button>
		</div>
	</section>

	<?php } ?>