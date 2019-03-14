<?php
class Seccion{
	function metaTitle($idSeccion){
		$sql=mysql_query("SELECT * FROM Seccion WHERE idSeccion='".seguridad_sql($idSeccion)."'");
		$col=mysql_fetch_array($sql);
		$aux = '
			<meta property="og:title" content="'.htmlentities($col['Titulo']." - ".$GLOBALS['Sufijo']).'" />
			';
		$aux .= '
			<meta property="og:image" content="'.$GLOBALS['Configuracion']['Dominio'].$GLOBALS['Configuracion']['Ruta'].'img/logo.png" />
			';
		$aux .= "<title>".$col['Titulo']." - ".$GLOBALS['Sufijo']."</title>";
		return $aux;
	}

	function obtenerAtributo($atributo,$idSeccion){
		$sql = mysql_query("SELECT ".$atributo." FROM Seccion WHERE idSeccion = '".$idSeccion."'");
		if(mysql_num_rows($sql)){
			$col = mysql_fetch_array($sql);
			return $col[$atributo];
		} else return false;
	}

	function obtenerAtributoElemento($atributo,$idElemento){
		$sql = mysql_query("SELECT ".$atributo." FROM Elemento WHERE idElemento = '".$idElemento."'");
		if(mysql_num_rows($sql)){
			$col = mysql_fetch_array($sql);
			return $col[$atributo];
		} else return false;
	}

	function obtenerTitulo($idSeccion){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Seccion LIKE 'Titulo_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT Titulo_".$_SESSION['idioma']." FROM Seccion WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo_'.$_SESSION['idioma']];
		}else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT Titulo FROM Seccion WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo'];
		}
	}

	function obtenerTexto($idSeccion){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Seccion LIKE 'Texto_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT Texto_".$_SESSION['idioma']." FROM Seccion WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto_'.$_SESSION['idioma']];
		}else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT Texto FROM Seccion WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto'];
		}
	}

	function GrupoElementos($idElementoGrupo){
		$aux = array();
		$sql = mysql_query("SELECT * FROM Elemento WHERE idElementoGrupo = '".seguridad_sql($idElementoGrupo)."'");
		while($col = mysql_fetch_array($sql)){
			array_push($aux,$col['idElemento']);
		}
		return $aux;
	}

	function ObtenerAlbums($idSeccion){
		$aux = array();
		$sql = mysql_query("SELECT * FROM Album WHERE idSeccion = '".seguridad_sql($idSeccion)."'");
		while($col = mysql_fetch_array($sql)){
			array_push($aux,$col['idAlbum']);
		}
		return $aux;
	}

	function obtenerFotoElemento($idElemento){
		$sql = mysql_query("SELECT FotoNombreArchivo FROM Elemento WHERE idElemento = '".$idElemento."'");
		if(mysql_num_rows($sql)){
			$col = mysql_fetch_array($sql);
			return $col['FotoNombreArchivo'];
		} else return false;
	}

	function obtenerTituloElemento($idElemento){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Elemento LIKE 'Titulo_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT Titulo_".$_SESSION['idioma']." FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo_'.$_SESSION['idioma']];	
		}
		else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT Titulo FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Titulo'];
		}
	}
	function obtenerSubTituloElemento($idElemento){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Elemento LIKE 'SubTitulo_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT SubTitulo_".$_SESSION['idioma']." FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['SubTitulo_'.$_SESSION['idioma']];	
		}
		else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT SubTitulo FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['SubTitulo'];
		}
	}
	function obtenerLinkElemento($idElemento){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Elemento LIKE 'Link_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT Link_".$_SESSION['idioma']." FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Link_'.$_SESSION['idioma']];	
		}
		else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT Link FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Link'];
		}
	}
	function obtenerTextoElemento($idElemento){
		if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Elemento LIKE 'Texto_".$_SESSION['idioma']."' ")) == 1 ){
			// Se detecta un idioma
			$sql = mysql_query("SELECT Texto_".$_SESSION['idioma']." FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto_'.$_SESSION['idioma']];
		}else{
			// Español, o idioma nativo
			$sql = mysql_query("SELECT Texto FROM Elemento WHERE idElemento = '".seguridad_sql($idElemento)."'");
			$col = mysql_fetch_array($sql);
			return $col['Texto'];
		}
	}
}
?>