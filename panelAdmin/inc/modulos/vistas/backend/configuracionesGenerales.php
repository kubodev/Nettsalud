<title>Configuraciones generales| <? echo $sufijoTitulo; ?></title>
<?php $idSeccion = $_GET['idSeccion']; ?>
	<div class="col-md-9">
		<section class="seccion">
			<h1 class="titulo">Configuraciones generales</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo $ruta;?>">Panel de administración</a></li>
				<li class="active">Configuraciones generales</li>
			</ol>
		</section>
		<section class="seccion">
			<?php
			$dir=explode('inc',dirname(__FILE__));

			/* Scripts para envío de formulario */
			require_once($dir[0].'inc/modulos/php/scripts/configuracionesGenerales.php');
			/* Fin Scripts para envío de formulario */
			?>
			<form method="post" onsubmit="javascript:cargadorOn()" action="" enctype="multipart/form-data">		
				<?php
				$sql = mysql_query("SELECT * FROM VariablesInformacion");
				while($col = mysql_fetch_array($sql))
				{
					if($col['idTipoDescripcion_campo'] == 1)
					{
						?>
						<div class="lineaform">
							<label for="inputEmail3" class=" control-label"><?php echo $col['Nombre']; ?></label>
							<div >
								<input name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>" value="<?php echo $col['Valor']; ?>" placeholder="<?php echo $col['Nombre']; ?>" type="text"/>
							</div>
						</div>
						<?php
					}
					else if($col['idTipoDescripcion_campo'] == 3)
					{
						?>
						<div class="lineaform">
							<label for="inputEmail3" class=" control-label"><?php echo $col['Nombre']; ?></label>
							<div >
								<input name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>" value="<?php echo $col['Valor']; ?>" class="validarRut" placeholder="<?php echo $col['Nombre']; ?>" type="text"/>
							</div>
						</div>
						<?php
					}
					else if($col['idTipoDescripcion_campo'] == 4)
					{
						?>
						<div class="lineaform">
							<label for="inputEmail3" class=" control-label"><?php echo $col['Nombre']; ?></label>
							<div >
								<input name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>" value="<?php echo $col['Valor']; ?>" placeholder="<?php echo $col['Nombre']; ?>" type="number"/>
							</div>
						</div>
						<?php
					}
					else if($col['idTipoDescripcion_campo'] == 5)
					{
						?>
						<div class="lineaform">
							<label for="inputEmail3" class=" control-label"><?php echo $col['Nombre']; ?></label>
							<div >
								<input name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>" value="<?php echo $col['Valor']; ?>" placeholder="<?php echo $col['Nombre']; ?>" type="email"/>
							</div>
						</div>
						<?php
					}
					else if($col['idTipoDescripcion_campo'] == 6)
					{
						?>
						<div class="lineaform">
							<label for="inputEmail3" class=" control-label"><?php echo $col['Nombre']; ?></label>
							<div >
								<textarea name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>" class="form-control" rows="3"><?php echo $col['Valor']; ?></textarea>
							</div>
						</div>
						<script>
							cargarEditor('textarea[name="VariablesInformacion<?php echo $col['idVariablesInformacion']; ?>"]');			
						</script>
						<?php
						
					}
				}
				?>	
				<div class="lineaform">

					<button type="submit" class="submit boton" value="Enviar" name="enviar">Enviar</button>

				</div>	
			</form>
		</section>
	</div>