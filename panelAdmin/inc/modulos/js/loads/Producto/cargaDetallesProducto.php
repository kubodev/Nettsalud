<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$arrayDetalles = json_decode($_POST['arrayDetalles'],true);
	$arrayDetallesSeleccionados = json_decode($_POST['arrayDetallesSeleccionados'],true);
	foreach($arrayDetallesSeleccionados as $recorre)
	{
		if(strlen($recorre) > 0)
		{
			$totalArrayDetallesSeleccionados++;
		}
	}
	$sql4 = mysql_query("SELECT * FROM ProductoAtributo WHERE idProductoAtributo = '".$arrayDetalles[($_POST['idDetalle'])]."'");
	$col4 = mysql_fetch_array($sql4);
	?>
	<div class="ProductoAtributo" id="detalle<?php echo $_POST['idDetalle']; ?>">
		<h5>Seleccione <?php echo $col4['detalle']; ?></h5>
		<?php
		if(strtolower($col4['detalle']) != "color" && strtolower($col4['detalle']) != "colores")
		{
			$sql5 = mysql_query("SELECT * FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".$col4['idProductoAtributo']."'");
			while($col5 = mysql_fetch_array($sql5))
			{
				$sql7 = mysql_query("SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
				$esEstaRelacion = 0;
			//	echo "SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'";
				while($col7 = mysql_fetch_array($sql7))
				{
					//echo '['.$col7['idRel_ProductoAtributoDetalle_Producto'];
					foreach($arrayDetallesSeleccionados as $recorre)
					{
						//echo'en';
						if(strlen($recorre) > 0)
						{
							//echo 'an';
							$sql8 = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$recorre."' AND idRel_ProductoAtributoDetalle_Producto = '".$col7['idRel_ProductoAtributoDetalle_Producto']."'");
							//echo "SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$recorre."' AND idRel_ProductoAtributoDetalle_Producto = '".$col7['idRel_ProductoAtributoDetalle_Producto']."'";
							if(mysql_num_rows($sql8) == 0) $esEstaRelacion = 0; else $esEstaRelacion = 1;
						}
					}
					//echo ']';
					if($esEstaRelacion == 1) { $idRel_ProductoAtributoDetalle_Producto = $col7['idRel_ProductoAtributoDetalle_Producto']; }
					//echo $esEstaRelacion;
					//if(stock(seguridad_sql($_POST['idProducto']),$idRel_ProductoAtributoDetalle_Producto)) echo 'es'; else echo 'noes';
					if($esEstaRelacion == 1) { $idRel_ProductoAtributoDetalle_Producto = $col7['idRel_ProductoAtributoDetalle_Producto']; break; }
				}
				if($Producto->stock(seguridad_sql($_POST['idProducto']),$idRel_ProductoAtributoDetalle_Producto) > 0 && $esEstaRelacion == 1)	echo '<a id="valor'.$col5['idProductoAtributoDetalle'].'" href="javascript:seleccionaDetalle('.$col5['idProductoAtributoDetalle'].','.$_POST['idDetalle'].','.$col7['idRel_ProductoAtributoDetalle_Producto'].','.$col4['idProductoAtributo'].')">'.$col5['detalle'].'</a>';
			}
			
			?>
		<?php
		}
		else // Es color
		{
			$sql5 = mysql_query("SELECT * FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".$col4['idProductoAtributo']."'");
			while($col5 = mysql_fetch_array($sql5))
			{

				$sql6 = mysql_query("SELECT detalle FROM ColorProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
				$col6 = mysql_fetch_array($sql6);
				$sql7 = mysql_query("SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'");
				$esEstaRelacion = 0;
			//	echo "SELECT idRel_ProductoAtributoDetalle_Producto FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$col5['idProductoAtributoDetalle']."'";
				while($col7 = mysql_fetch_array($sql7))
				{
					//echo '['.$col7['idRel_ProductoAtributoDetalle_Producto'];
					foreach($arrayDetallesSeleccionados as $recorre)
					{
						//echo'en';
						if(strlen($recorre) > 0)
						{
							//echo 'an';
							$sql8 = mysql_query("SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$recorre."' AND idRel_ProductoAtributoDetalle_Producto = '".$col7['idRel_ProductoAtributoDetalle_Producto']."'");
							//echo "SELECT * FROM rel_ProductoAtributoDetalle_Producto WHERE idProducto = '".seguridad_sql($_POST['idProducto'])."' AND idProductoAtributoDetalle = '".$recorre."' AND idRel_ProductoAtributoDetalle_Producto = '".$col7['idRel_ProductoAtributoDetalle_Producto']."'";
							if(mysql_num_rows($sql8) == 0) $esEstaRelacion = 0; else $esEstaRelacion = 1;
						}
					}
					//echo ']';
					if($esEstaRelacion == 1) { $idRel_ProductoAtributoDetalle_Producto = $col7['idRel_ProductoAtributoDetalle_Producto']; }
					//echo $esEstaRelacion;
					//if(stock(seguridad_sql($_POST['idProducto']),$idRel_ProductoAtributoDetalle_Producto)) echo 'es'; else echo 'noes';
					if($esEstaRelacion == 1) { $idRel_ProductoAtributoDetalle_Producto = $col7['idRel_ProductoAtributoDetalle_Producto']; break; }
				}
				if($Producto->stock(seguridad_sql($_POST['idProducto']),$idRel_ProductoAtributoDetalle_Producto) > 0 && $esEstaRelacion == 1)	echo '<a id="valor'.$col5['idProductoAtributoDetalle'].'" href="javascript:seleccionaDetalle('.$col5['idProductoAtributoDetalle'].','.$_POST['idDetalle'].','.$idRel_ProductoAtributoDetalle_Producto.','.$col4['idProductoAtributo'].')" title="'.$col5['detalle'].'" class="color" style="background-color:'.$col6['detalle'].'"></a>';
			}
		}
		?>
	</div>
