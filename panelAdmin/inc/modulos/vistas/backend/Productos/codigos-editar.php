<title>Códigos de descuento | <? echo $sufijoTitulo; ?></title>
	<?php
	$idCodigoDescuento = $_GET['idCodigoDescuento'];
	?>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Códigos de descuento</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/codigos">Códigos de descuento</a></li>
				<li class="active">Editar</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Código:</label><input name="Codigo" maxlength="120" type="text" value="<?php echo $Producto->CodigoInformacion($idCodigoDescuento)['Codigo']; ?>" required/></div>
					<div class="lineaform"><label>Cantidad de usos permitidos:</label><input name="MaxUsos" maxlength="120" type="text" value="<?php echo $Producto->CodigoInformacion($idCodigoDescuento)['MaxUsos']; ?>" required/></div>
					<div class="lineaform"><label for="Ilimitado">Ilimitado</label> <input id="Ilimitado" <?php if($Producto->CodigoInformacion($idCodigoDescuento)['MaxUsos'] == 0) echo 'checked '; ?>name="MaxUsosIlimitado" value="1" type="checkbox"></div>
					<div class="lineaform"><a href="javascript:Mos(1)">Asignar descuento por %</a> / <a href="javascript:Mos(2)">Asignar descuento por monto</a></div>
					<div class="lineaform">
						<div id="Box1" class="box">
							<label>% de descuento:</label><input type="number" value="<?php echo $Producto->CodigoInformacion($idCodigoDescuento)['Porcentaje']; ?>" name="Porcentaje">

						</div>
						<div id="Box2" class="box">
							<label>Monto:</label><input type="number" value="<?php echo $Producto->CodigoInformacion($idCodigoDescuento)['Monto']; ?>" name="Monto">

						</div>
					</div>
					<input type="hidden" name="idCodigoDescuento" value="<?php echo $idCodigoDescuento; ?>">


					<div class="lineaform">
						<a href="../eliminar/?idCodigoDescuento=<?php echo $_GET['idCodigoDescuento']; ?>" class="eliminar boton">Eliminar</a>
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoCodigo_editar.php"); ?>
				<script>
				function Mos(id)
				{
					$('.box input').val("");
					$('.box').fadeOut("slower",function(){$('#Box'+id).fadeIn("slower");});
				}
				</script>
		</section>
	</div>