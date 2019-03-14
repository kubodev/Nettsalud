<title>Atributos de Producto | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Atributos de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li><a href="<?php echo $ruta;?>productos/atributos">Atributos de Producto</a></li>
				<li class="active">Editar</li>
			</ol>
		</section>
		<section class="seccion">
			<form style="width:470px;" id="formProductos" method="post" enctype="multipart/form-data">
					<div class="lineaform"><label>Atributo:</label><input name="nombre" placeholder="ej: Color, Talla, Textura" value="<?php echo $Producto->nombreAtributo($_GET['idProductoAtributo']) ?>" maxlength="120" type="text" required/></div>
					<input type="hidden" name="idProductoAtributo" value="<?php echo $_GET['idProductoAtributo']; ?>">
					<div class="lineaform">
						<a href="../eliminar/?idProductoAtributo=<?php echo $_GET['idProductoAtributo']; ?>" class="eliminar boton">Eliminar</a>
						<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>
					</div>
					<div style="height:40px; clear:both"></div>

					<h2>Detalles de Atributo</h2>
					<div style="height:20px; clear:both"></div>
					<?php

					$sql2 = mysql_query("SELECT * FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".seguridad_sql($_GET['idProductoAtributo'])."'");

					if(mysql_num_rows($sql2) > 0)

					{

						while($col2 = mysql_fetch_array($sql2))

						{

							echo '<div class="categoria"><a href="../editarDetalle/?id='.$col2['idProductoAtributoDetalle'].'&idProductoAtributoDetalle='.$col2['idProductoAtributoDetalle'].'" class="nohref"><img src="'.$ruta.'img/flecha.png" style="position:relative; top:-2px;" alt="" /> '.seguridad_php($col2['detalle']).'</a></div>';

						}

					} else echo 'Aún no hay detalles de especificación. Agrega uno.';

					?>

					
					<div id="respuesta"></div>
				</form>
				<br /><br /><a href="../agDetalle/?idProductoAtributo=<?php echo $_GET['idProductoAtributo']; ?>"><button class="boton mini">Agregar detalle</button></a><br /><br />
				<?php 
				$dir=explode('inc',dirname(__FILE__));
				require_once($dir[0]."inc/modulos/js/funciones_productoAtributo_editar.php"); ?>
		</section>
	</div>