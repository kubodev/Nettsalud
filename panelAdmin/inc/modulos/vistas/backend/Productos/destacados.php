<title>Productos destacados | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Productos destacados</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active"><a href="<?php echo $ruta;?>productos/marcas">Productos destacados</a></li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formDestacados" method="post" enctype="multipart/form-data">
				<?php
				$posicion=0;
				$sql = mysql_query("SELECT * FROM ProductoDestacado");
				while($col = mysql_fetch_array($sql))
				{
					$posicion++;
					?>
					<div class="lineaform">
						<label>Posición <?php echo $posicion; ?>:</label>
						<select name="ProductoDestacado<?php echo $col['idProductoDestacado']; ?>">
						<?php
						$sql2 = mysql_query("SELECT * FROM Producto");
						while($col2 = mysql_fetch_array($sql2))
						{
							?>
							<option value="<?php echo $col2['idProducto']; ?>" <?php if($col2['idProducto'] == $col['idProducto']) echo 'selected'; ?>><?php echo $Producto->obtenerInformacion($col2['idProducto'])['Nombre']; ?></option>
							<?php
						}
						?>
						</select>
					</div>
					<?php
				}
				?>
					<div class="lineaform">
						<button type="submit" class="submit boton" value="Enviar" name="enviar">GUARDAR</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productosDestacados.php"); ?>
		</section>
	</div>