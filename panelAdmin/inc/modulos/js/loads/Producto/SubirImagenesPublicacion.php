<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	if(!$_SESSION['subiendoFotos']) $_SESSION['subiendoFotos'] = array();
	for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) 
	{
		if($_FILES [ 'fotos'][ 'size' ][$i] > 0)
		{
			$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente
			$tamano = $_FILES [ 'fotos' ][ 'size' ][$i];
			$dir=explode('inc',dirname(__FILE__));
			$destino = $Configuracion['RutaAbsoluta'].'panelAdmin/img/Productos' ;
			if(esImagen($_FILES ['fotos' ][ 'name' ][$i]))
			{ 
				$_SESSION['subiendoFotos'][$nombreArchivo] = $nombreArchivo.'.png';
				GuardarFotoMin(900,$destino . '/' .$nombreArchivo.'.png',$_FILES [ 'fotos' ][ 'tmp_name' ][$i]); 
			} else MsjError("La imagen tiene un formato incorrecto");
		}
	}
	foreach($_SESSION['subiendoFotos'] as $foto)
	{
		if(strlen($foto))
		{
			$str = explode('.',$foto)[0];
			?>
			<div class="col-xs-3 col-md-2" id="<?php echo $str; ?>">
				<figure class="fotoSubir">
					<img src="<?php echo $Configuracion['Ruta']; ?>panelAdmin/img/Productos/<?php echo $foto; ?>" class="img-responsive" alt="">
					<a href="javascript:elimFoto('<?php echo $str; ?>')"><img src="<?php echo $ruta; ?>img/cerrarCruz.png"></a>
				</figure>
			</div>
			<?php
		}
	}
?>