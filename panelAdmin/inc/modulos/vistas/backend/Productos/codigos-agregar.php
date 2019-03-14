<title>Códigos de descuento | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Códigos de descuento</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/codigos">Códigos de descuento</a></li>
				<li class="active">Agregar</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Código:</label><input name="Codigo" maxlength="120" type="text" required/></div>
					<div class="lineaform"><label>Cantidad de usos permitidos:</label><input name="MaxUsos" maxlength="120" type="text" required/></div>
					<div class="lineaform"><label for="Ilimitado">Ilimitado</label> <input id="Ilimitado" name="MaxUsosIlimitado" value="1" type="checkbox"></div>
					<div class="lineaform"><a href="javascript:Mos(1)">Asignar descuento por %</a> / <a href="javascript:Mos(2)">Asignar descuento por monto</a></div>
					<div class="lineaform">
						<div id="Box1" class="box" style="display: none">
							<label>% de descuento:</label><input type="number" name="Porcentaje">

						</div>
						<div id="Box2" class="box" style="display: none">
							<label>Monto:</label><input type="number" name="Monto">

						</div>
					</div>
					<div class="lineaform">
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div id="respuesta"></div>
				</form>
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoCodigo_agregar.php"); ?>
				<script>
				function Mos(id)
				{
					$('.box input').val("");
					$('.box').fadeOut("slower",function(){$('#Box'+id).fadeIn("slower");});
				}
		
				</script>
		</section>
	</div>