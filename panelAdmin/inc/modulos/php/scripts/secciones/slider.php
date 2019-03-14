<?php
if(isset($_POST['enviar_slider'])) //Enviar imágenes slider
{	
	$sql2 = mysql_query("SELECT * FROM SliderFoto where idSeccion = '".seguridad_sql($idSeccion)."' ORDER BY idSliderFoto ASC");
	while($col2 = mysql_fetch_array($sql2))
	{
		if($_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'size' ] > 0)
		{
			$nombreArchivo = cadenatexto(12); // Genera string aleatoriamente
			$tamano = $_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'size' ]; 
			$dirimg=explode('panelAdmin',dirname(__FILE__));
			$destino = $dirimg[0].'img' ; 
			if(esImagen($_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'name' ]))
			{ 
				GuardarFotoMin(1400,$destino . '/' .$nombreArchivo.'.'.extensionArchivo($_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'name' ]),$_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'tmp_name' ]);
				
				mysql_query("UPDATE SliderFoto SET NombreArchivo = '".$nombreArchivo.'.'.extensionArchivo($_FILES [ 'slider_img_'.$col2['idSliderFoto'] ][ 'name' ])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
			} else MsjError("La imagen ".$col2['idSliderFoto']." tiene un formato incorrecto");
		}
		mysql_query("UPDATE SliderFoto SET Titulo = '".seguridad_sql($_POST['slider_titulo_'.$col2['idSliderFoto']])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			mysql_query("UPDATE SliderFoto SET Titulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['slider_titulo_'.$col2['idSliderFoto'].'_'.$idiomas[$posicion]])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		}
		mysql_query("UPDATE SliderFoto SET Texto = '".seguridad_sql($_POST['slider_texto_'.$col2['idSliderFoto']])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			mysql_query("UPDATE SliderFoto SET Texto_".$idiomas[$posicion]." = '".seguridad_sql($_POST['slider_texto_'.$col2['idSliderFoto'].'_'.$idiomas[$posicion]])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		}
		mysql_query("UPDATE SliderFoto SET BotonTitulo = '".seguridad_sql($_POST['slider_botonTitulo_'.$col2['idSliderFoto']])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			mysql_query("UPDATE SliderFoto SET BotonTitulo_".$idiomas[$posicion]." = '".seguridad_sql($_POST['slider_botonTitulo_'.$col2['idSliderFoto'].'_'.$idiomas[$posicion]])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		}
		mysql_query("UPDATE SliderFoto SET BotonUrl = '".seguridad_sql($_POST['slider_botonUrl_'.$col2['idSliderFoto']])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		if(count($idiomas) > 1) // Sistema de idiomas
		{
			for($posicion=1; $posicion<count($idiomas); $posicion++) // Parte desde el 1 así saltamos el español, que ya se declaró arriba
			mysql_query("UPDATE SliderFoto SET BotonUrl_".$idiomas[$posicion]." = '".seguridad_sql($_POST['slider_botonUrl_'.$col2['idSliderFoto'].'_'.$idiomas[$posicion]])."' WHERE idSliderFoto = '".$col2['idSliderFoto']."'");
		}
	}
}
?>