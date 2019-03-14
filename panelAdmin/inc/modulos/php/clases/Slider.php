<?php
class Slider
{
	public function obtenerImg($idSliderFoto)
	{
		$sql = mysql_query("SELECT NombreArchivo FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
		$col = mysql_fetch_array($sql);
		return $col['NombreArchivo'];
	}	
	public function obtenerTitulo($idSliderFoto)
	{
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM SliderFoto LIKE 'Titulo_".$_SESSION['idioma']."' ")) == 1 ) // Se detecta un idioma
		{
			$sql = mysql_query("SELECT Titulo_".$_SESSION['idioma']." FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo_'.$_SESSION['idioma']];
			
		}
		else // Español, o idioma nativo
		{
			$sql = mysql_query("SELECT Titulo FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo'];
			
		}
	}
	public function obtenerTexto($idSliderFoto)
	{
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM SliderFoto LIKE 'Texto_".$_SESSION['idioma']."' ")) == 1 ) // Se detecta un idioma
		{
			$sql = mysql_query("SELECT Texto_".$_SESSION['idioma']." FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto_'.$_SESSION['idioma']];
			
		}
		else // Español, o idioma nativo
		{
			$sql = mysql_query("SELECT Texto FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto'];
			
		}
	}
	public function obtenerBotonTitulo($idSliderFoto)
	{
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM SliderFoto LIKE 'BotonTitulo_".$_SESSION['idioma']."' ")) == 1 ) // Se detecta un idioma
		{
			$sql = mysql_query("SELECT BotonTitulo_".$_SESSION['idioma']." FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['BotonTitulo_'.$_SESSION['idioma']];
			
		}
		else // Español, o idioma nativo
		{
			$sql = mysql_query("SELECT BotonTitulo FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['BotonTitulo'];
			
		}
	}
	public function obtenerBotonUrl($idSliderFoto)
	{
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM SliderFoto LIKE 'BotonUrl_".$_SESSION['idioma']."' ")) == 1 ) // Se detecta un idioma
		{
			$sql = mysql_query("SELECT BotonUrl_".$_SESSION['idioma']." FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['BotonUrl_'.$_SESSION['idioma']];
			
		}
		else // Español, o idioma nativo
		{
			$sql = mysql_query("SELECT BotonUrl FROM SliderFoto WHERE idSliderFoto = '".seguridad_sql($idSliderFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['BotonUrl'];
			
		}
	}
}
?>