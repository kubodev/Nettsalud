<?php


	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	?>

	

			<label class="label_modelo">Modelo <?php echo $_POST['idModelo']; ?>: </label> 

			<div class="clear" style="height:20px;"></div>

			<div class="especificacion">

				<select name="detalle1">

					<?php
					$sql = mysql_query("SELECT ProductoAtributoDetalle.detalle as nombreDetalle,ProductoAtributo.detalle as nombreAtributo,ProductoAtributoDetalle.idProductoAtributoDetalle FROM ProductoAtributoDetalle inner join ProductoAtributo on ProductoAtributoDetalle.idProductoAtributo = ProductoAtributo.idProductoAtributo");				

					while($col = mysql_fetch_array($sql))				

					{

						echo '<option value="'.$col['idProductoAtributoDetalle'].'">'.$col['nombreAtributo'].' '.$col['nombreDetalle'].'</option>';				

					}
					?>	

				</select>		

			</div>		

			<div class="especificacion" id="otra-especif">

				<span onclick="anadirEspecificacion(<?php echo $_POST['idModelo']; ?>)" class="boton">Agregar otra especificación</span>			

				<a class="boton mini distancia-a" href="javascript:guardarModelo(<?php echo $_POST['idModelo']; ?>)">Guardar modelo</a>		

			</div>		

			<div class="especificacion" style="    float: right; padding-top: 5px; height: 30px;">

				<span class="borrar boton" onclick="javascript:borrarModelo(<?php echo $_POST['idModelo']; ?>)">Eliminar modelo</span>

			</div>

			<input id="especificacion1" type="hidden">		

			<input id="especificacion2" type="hidden">		

			<input id="especificacion3" type="hidden">		

			<input id="especificacion4" type="hidden">		

			<div class="clear"></div>	



