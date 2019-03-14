<?php

	$dir=explode('inc',dirname(__FILE__));

	require_once($dir[0]."inc/controlador.php");
	$sql2 = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."'");
	if(mysql_num_rows($sql2) > 0)
	{
		$idModelo = 1;
		while($col2 = mysql_fetch_array($sql2))
		{
			if($cargasEstaId[$idModelo] == 0 && $yaCargo[$col2['idRel_ProductoAtributoDetalle_Producto']] == 0)
			{
				$posicionDetalle[$idModelo]++;
				if($posicionDetalle[$idModelo] == 1)
					echo'	
					<div class="modelo" modelo="'.$idModelo.'" id="modelo'.$idModelo.'" rel="'.$col2['idRel_ProductoAtributoDetalle_Producto'].'">
						<label class="label_modelo">Modelo '.$idModelo.': </label> 
						<div class="clear" style="height:20px;"></div>';
							$posicion=0;
							$sql3 = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".$col2['idRel_ProductoAtributoDetalle_Producto']."'");
							while($col3 = mysql_fetch_array($sql3))
							{
								$posicion++;
								echo'<div class="especificacion">';
									echo'<select name="detalle'.$posicion.'">';				
										$sql = mysql_query("SELECT ProductoAtributoDetalle.idProductoAtributoDetalle,ProductoAtributoDetalle.detalle as nombreDetalle,ProductoAtributo.detalle as nombreAtributo FROM ProductoAtributoDetalle inner join ProductoAtributo on ProductoAtributoDetalle.idProductoAtributo = ProductoAtributo.idProductoAtributo");				
										while($col = mysql_fetch_array($sql))				
										{
											echo '<option value="'.$col['idProductoAtributoDetalle'].'"'; if($col3['idProductoAtributoDetalle'] == $col['idProductoAtributoDetalle']) echo ' selected'; echo'>'.$col['nombreAtributo'].' '.$col['nombreDetalle'].'</option>';				
										}
									echo'			
									</select>';
								echo'</div>';
							}
						if($posicionDetalle[$idModelo] == 1)
						{
							$sql4 = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idRel_ProductoAtributoDetalle_Producto = '".$col2['idRel_ProductoAtributoDetalle_Producto']."'");
							$col4 = mysql_fetch_array($sql4);
							echo'	
							<div class="especificacion" id="otra-especif">
								<div class="especificacion"><div class="lineaform"><label>SKU:</label><input placeholder="Ej: 55588" value="'.$col4['SKU'].'" name="sku'.$idModelo.'"></div><div class="lineaform"><label>Stock:</label><input placeholder="Ej: 10" value="'.$col4['Stock'].'" name="stock'.$idModelo.'"></div><div class="lineaform"><label>Precio:</label><input value="'.$col4['Precio'].'" placeholder="12990" name="precio'.$idModelo.'"></div></div>		
							</div>	
							<div class="especificacion">		
								<a class="boton mini" href="javascript:guardarModelo_noSpawn('.$idModelo.')">Guardar modelo</a>		
							</div>		
							<div class="especificacion" style="float:right;padding-top:5px;height:30px;">
								<span class="borrar boton mini" onclick="javascript:borrarModelo('.$idModelo.')">Eliminar modelo</span>
							</div>
							<input id="especificacion1" type="hidden">		
							<input id="especificacion2" type="hidden">		
							<input id="especificacion3" type="hidden">		
							<input id="especificacion4" type="hidden">		
							<div class="clear"></div>';
							echo'</div>';
						}
				$cargasEstaId[$idModelo]++;
				$yaCargo[$col2['idRel_ProductoAtributoDetalle_Producto']] = 1;
				$idModelo++;
			}
		}
		echo '<input type="hidden" id="totalModelos" value="'.($idModelo-1).'">';
	}
	if($idModelo == 0) echo '<span>Aún no has cargado modelos, este producto registra como \'Sin stock\'.</span><input type="hidden" id="totalModelos" value="0">';
