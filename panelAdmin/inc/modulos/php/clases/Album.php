<?php 

	class Album{

		public function obtenerTitulo($idAlbum)
		{
			if ( mysql_num_rows(mysql_query("SHOW COLUMNS FROM Album LIKE 'Nombre_".$_SESSION['idioma']."' ")) == 1 ) // Se detecta un idioma
			{
				$sql = mysql_query("SELECT Nombre_".$_SESSION['idioma']." FROM Album WHERE idAlbum = '".seguridad_sql($idAlbum)."'");
				$col = mysql_fetch_array($sql);
				return $col['Nombre_'.$_SESSION['idioma']];
				
			}
			else // Español, o idioma nativo
			{
				$sql = mysql_query("SELECT Nombre FROM Album WHERE idAlbum = '".seguridad_sql($idAlbum)."'");
				$col = mysql_fetch_array($sql);
				return $col['Nombre'];
				
			}
		}
		public function obtenerFotos($idAlbum)
		{
			$aux = array();
			$sql = mysql_query("SELECT * FROM AlbumFoto WHERE idAlbum = '".seguridad_sql($idAlbum)."'");
			while($col = mysql_fetch_array($sql))
			{
				array_push($aux,$col['NombreArchivo']);
			}
			return $aux;
		}
		public function obtenerFotoPrincipal($idAlbum)
		{
			$sql = mysql_query("SELECT NombreArchivo FROM AlbumFoto WHERE idAlbum = '".seguridad_sql($idAlbum)."' ORDER BY idAlbumFoto DESC LIMIT 1");
			if(mysql_num_rows($sql) == 1)
			{
				$col = mysql_fetch_array($sql);
				return $col['NombreArchivo'];
			} else return false;
		}
		public function tieneFotos($idAlbum)
		{
			$sql = mysql_query("SELECT NombreArchivo FROM AlbumFoto WHERE idAlbum = '".seguridad_sql($idAlbum)."' ORDER BY idAlbumFoto DESC LIMIT 1");
			if(mysql_num_rows($sql) == 1)
			{
				return true;
			} else return false;
		}

	}