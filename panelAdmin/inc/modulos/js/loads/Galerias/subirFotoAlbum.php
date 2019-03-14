<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	if(!$_SESSION['subiendoFotos']) $_SESSION['subiendoFotos'] = array();
	for ($i = 0; $i < count($_FILES['cargador']['name']); $i++) 
	{
		if($_FILES [ 'cargador'][ 'size' ][$i] > 0)
		{
			$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente
			$tamano = $_FILES [ 'cargador' ][ 'size' ][$i];
			$dir=explode('panelAdmin',dirname(__FILE__));
			$destino = $dir[0].'img' ;  
			if(esImagen($_FILES ['cargador' ][ 'name' ][$i]))
			{ 
				$_SESSION['subiendoFotos'][$nombreArchivo] = $nombreArchivo;
				move_uploaded_file($_FILES [ 'cargador' ][ 'tmp_name' ][$i],$destino . '/' .$nombreArchivo.'.png');
				mysql_query("INSERT INTO AlbumFoto (`idAlbum`,`NombreArchivo`) VALUES ('".seguridad_sql($_POST['idAlbum'])."','".$nombreArchivo.".png"."')");
				
			} else MsjError("La imagen tiene un formato incorrecto");
		}
	}
	foreach($_SESSION['subiendoFotos'] as $foto)
	{
		$sql = mysql_query("SELECT * FROM AlbumFoto WHERE NombreArchivo = '".$foto.".png'");
		if(mysql_num_rows($sql))
		{
			$col = mysql_fetch_array($sql);
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
	}
	unset($_SESSION['subiendoFotos']);
?>