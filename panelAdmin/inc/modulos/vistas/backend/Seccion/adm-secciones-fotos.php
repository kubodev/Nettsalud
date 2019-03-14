<?php
$sql2 = mysql_query("SELECT * FROM SeccionFoto WHERE idSeccion = '".$idSeccion."'");
if(mysql_num_rows($sql2) > 0){ ?>

<section class="seccion">
	<h2 class="titulo_int">Imágenes</h2>
	<div class="contadm">
		<form onsubmit="javascript:cargadorOn()" method="post" style="width:100%; padding:0" enctype="multipart/form-data">
			<ul class="fotos row">
				<?php
				while($col2 = mysql_fetch_array($sql2)){ ?>
					<li class="col-md-6">
						<div class="admcontimg">
							<h4><?php echo $col2['Identificador']; ?></h4>
							<img src="<?php echo $Configuracion['Ruta']; ?>img/<?php echo $col2['NombreArchivo']; ?>">
							<div class="botonesEditar">
								<a href="javascript:abrirImg(<?php echo $col2['idSeccionFoto']; ?>)" data-toggle="tooltip" data-original-title="Editar"><span class="glyphicon glyphicon-pencil ed"></span></a>
							</div>
							<div id="fo<?php echo $col2['idSeccionFoto']; ?>" class="field sliderInfoCont">
								<label>Imagen:</label>
								<input onchange="javascript:cargadorOn();this.form.submit()" name="img<?php echo $col2['idSeccionFoto']; ?>" type="file"/>
							</div>
						</div>
					</li>
					<input type="hidden" name="envimg" value="1">
				<?php } ?>
			</ul>
		</form>
	</div>
</section>
<?php }