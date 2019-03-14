<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$idProducto = $_POST['idProducto'];
	if(!$_SESSION['subiendoFotos'][$idProducto]) $_SESSION['subiendoFotos'][$idProducto] = array();
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
				$_SESSION['subiendoFotos'][$idProducto][$nombreArchivo] = $nombreArchivo.'.png';
				GuardarFotoMin(900,$destino . '/' .$nombreArchivo.'.png',$_FILES [ 'fotos' ][ 'tmp_name' ][$i]); 
			} else MsjError("La imagen tiene un formato incorrecto");
		}
	}
	foreach($_SESSION['subiendoFotos'][$idProducto] as $foto)
	{
		?>
		<div class="col-xs-6 col-md-3" id="<?php echo $foto; ?>">
			<figure class="fotoSubir">
				<img src="<?php echo $Configuracion['Ruta']; ?>panelAdmin/img/Productos/<?php echo $foto; ?>" class="img-responsive" alt="">
				<a href="javascript:elimFoto('<?php echo $foto; ?>')"><img src="<?php echo $ruta; ?>img/cerrarCruz.png"></a>
			</figure>
		</div>
		<?php
	}
?>