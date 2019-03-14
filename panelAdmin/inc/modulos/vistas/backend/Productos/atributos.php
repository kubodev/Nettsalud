<title>Atributos de Producto | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Atributos de Producto</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active">Atributos de Producto</li>
			</ol>
		</section>
		<section class="seccion">
			<?php
				$sql = mysql_query("SELECT * FROM ProductoAtributo");
				while($col = mysql_fetch_array($sql))
				{
					?>
					<div class="categoria"><a href="editar/?idProductoAtributo=<?php echo $col['idProductoAtributo']; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px;" alt="" /> <?php echo $col['detalle'];?></a></div>
					<?php
				}
				?>
				<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nuevo atributo</a>
		</section>
	</div>