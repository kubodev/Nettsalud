<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Ver album</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li><a href="<?php echo $ruta; ?>galerias">Galerías</a></li>
			<li class="active">Ver album</li>
		</ol>
	</section>

	
	<section class="seccion">
		<?php
		$dir=explode('inc',dirname(__FILE__));
		$sql = mysql_query("SELECT * FROM Album WHERE idAlbum = '".seguridad_sql($_GET['idAlbum'])."'");
		$col = mysql_fetch_array($sql);
		?>
		<form onsubmit="javascript:cargadorOn()" id="album-editar" method="post">

			<div class="lineaform"><label>Nombre:</label><input name="Nombre" value="<?php echo $col['Nombre']; ?>" maxlength="200" type="text"/></div>
			<?php
			if(count($idiomas) > 1) // Sistema de idiomas

			{

				for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba

				echo'<div class="lineaform"><label>Nombre ['.$idiomas[$posicion].']:</label><input value="'.$col['Nombre_'.$idiomas[$posicion]].'" name="Nombre_'.$idiomas[$posicion].'" maxlength="120" type="text"/></div>';

			}
			?>
			
			<div class="lineaform">
			<input type="hidden" name="idAlbum" value="<?php echo $_GET['idAlbum']; ?>">
			<a href="../eliminar/?idAlbum=<?php echo $_GET['idAlbum']; ?>" class="eliminar boton">Eliminar album</a>
			<button type="submit" class="submit boton" value="Enviar" name="enviar">Actualizar nombre</button>

			</div>

		</form>
		<div style="height:40px"></div>
		<h1 class="titulo">Fotos</h1>
		<ul id="listaFotos">
			<li class="foto" style="display:none"></li>
			<?php
			$sql = mysql_query("SELECT * FROM AlbumFoto WHERE idAlbum = '".seguridad_sql($_GET['idAlbum'])."'");
			while($col = mysql_fetch_array($sql))
			{
				?>
				<li class="foto" id="foto<?php echo $col['idAlbumFoto']; ?>">
					<a href="javascript:borrarFotoAlbum(<?php echo $col['idAlbumFoto']; ?>)"><img align="right" src="<?php echo $ruta; ?>img/borrar.gif"></a>
					<?php
					if(strlen($col['NombreArchivo']))
					{ ?>
					
							
						<div class="fotoMinEdicion">
							<img src="<?php echo $Configuracion['Ruta'];?>img/<?php echo $col['NombreArchivo']; ?>">
						</div>
								
						<?php
					}
					?>
				</li>
				<?php
			}
			?>
		</ul>
		<div class="clear" style="height:20px"></div>
		<h2>Agregar nueva(s) foto(s)</h2>
		<form method="post" style="margin-top:10px" id="cargarFotos" action="" enctype="multipart/form-data">
			<input type="hidden" name="idAlbum" value="<?php echo $_GET['idAlbum']; ?>">
			<div class="lineaform">
				<div class="row">
					<div class="col-md-6">
						<input name="cargador[]" multiple type="file"/>
					</div>
				</div>
			</div>
		</form>
		<?php
		require("../../inc/modulos/js/funciones_album-editar.php"); ?>
	</section>
		
	
</div>