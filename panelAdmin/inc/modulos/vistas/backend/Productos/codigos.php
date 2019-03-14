<title>Códigos de descuento | <? echo $sufijoTitulo; ?></title>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Códigos de descuento</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active">Códigos de descuento</li>
			</ol>
		</section>
		<section class="seccion">
			<?php
				$sql = mysql_query("SELECT * FROM CodigoDescuento WHERE Habilitado = '1'");
				while($col = mysql_fetch_array($sql))
				{
					?>
					<div class="categoria"><a href="editar/?idCodigoDescuento=<?php echo $col['idCodigoDescuento']; ?>" class="nohref"><img src="<?php echo $ruta; ?>img/flecha.png" style="position:relative; top:-2px;" alt="" /> <?php echo $col['Codigo']; ?></a></div>
					<?php
				}
				?>
				<a href="agregar" class="boton"><span class="glyphicon glyphicon-plus"></span>Agregar nuevo código</a>
		</section>
	</div>