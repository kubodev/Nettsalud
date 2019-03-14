<?php 
	class Publicacion{
		public function nombreCategoria($idPublicacion){
			$sql = mysql_query("SELECT PublicacionCategoria.Nombre FROM PublicacionCategoria inner join Publicacion on Publicacion.idPublicacionCategoria = PublicacionCategoria.idPublicacionCategoria WHERE Publicacion.idPublicacion = '".seguridad_sql($idPublicacion)."'");
			$col = mysql_fetch_array($sql);
			return $col['Nombre'];
		}
		function metaTitle($idPublicacion)
		{
			return "<title>".$this->obtenerTitulo($idPublicacion)." - ".$GLOBALS['Sufijo']."</title>";
		}

		function nombreCat($idPublicacionCategoria){
			$sql=mysql_query("SELECT * FROM PublicacionCategoria WHERE idPublicacionCategoria='$idPublicacionCategoria'");
			if(mysql_num_rows($sql)){
				$col=mysql_fetch_array($sql);
				return $col['Nombre'];
			}
		}

		function cantidadCat($idPublicacionCategoria){
			$sql=mysql_query("SELECT count(idPublicacion) as total FROM Publicacion WHERE idPublicacionCategoria='$idPublicacionCategoria'");
			if(mysql_num_rows($sql)){
				$col=mysql_fetch_array($sql);
				return $col['total'];
			}
		}

		function obtenerAtributo($atributo,$idPublicacion){
			$sql = mysql_query("SELECT ".$atributo." FROM Publicacion WHERE idPublicacion = '".$idPublicacion."'");
			if(mysql_num_rows($sql)){
				$col = mysql_fetch_array($sql);
				return $col[$atributo];
			} else return false;
		}

		function obtenerFoto($idPublicacion){
			$sql = mysql_query("SELECT NombreArchivo FROM Publicacion WHERE idPublicacion = '".$idPublicacion."'");
			if(mysql_num_rows($sql)){
				$col = mysql_fetch_array($sql);
				return $col['NombreArchivo'];
			} else return false;
		}

		function obtenerTitulo($idPublicacion){
			if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Publicacion LIKE 'Titulo_".$_SESSION['idioma']."' ")) == 1 ){
				// Se detecta un idioma
				$sql = mysql_query("SELECT Titulo_".$_SESSION['idioma']." FROM Publicacion WHERE idPublicacion = '".seguridad_sql($idPublicacion)."'");
				$col = mysql_fetch_array($sql);
				return $col['Titulo_'.$_SESSION['idioma']];
			}

			else {
				// Español, o idioma nativo
				$sql = mysql_query("SELECT Titulo FROM Publicacion WHERE idPublicacion = '".seguridad_sql($idPublicacion)."'");
				$col = mysql_fetch_array($sql);
				return $col['Titulo'];
			}
		}

		function obtenerTexto($idPublicacion,$textoCorto){
			if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Publicacion LIKE 'Texto_".$_SESSION['idioma']."' ")) == 1 ){
				// Se detecta un idioma
				$sql = mysql_query("SELECT Texto_".$_SESSION['idioma']." FROM Publicacion WHERE idPublicacion = '".seguridad_sql($idPublicacion)."'");
				$col = mysql_fetch_array($sql);
				
				if($textoCorto){
					return strip_tags(substr($col['Texto_'.$_SESSION['idioma']],0,100))."...";
				}else{
					return $col['Texto_'.$_SESSION['idioma']];
				}
			}else{
				// Español, o idioma nativo
				$sql = mysql_query("SELECT Texto FROM Publicacion WHERE idPublicacion = '".seguridad_sql($idPublicacion)."'");
				$col = mysql_fetch_array($sql);

				if($textoCorto){
					return strip_tags(substr($col['Texto'],0,100))."...";
				}else{
					return $col['Texto'];
				}
			}
		}
		function sinDuplicados($duplicados){
			$auxCont = 0;
			foreach ($duplicados as $duplicado) {
				if($auxCont>0) $cad.=',';
				$cad.=$duplicado;
				$auxCont++;
			}
			return $cad;
		}
	}