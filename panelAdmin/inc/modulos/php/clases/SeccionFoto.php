<?php 
	class SeccionFoto{
		public function obtenerFoto($idSeccionFoto){
			$sql = mysql_query("SELECT NombreArchivo FROM SeccionFoto WHERE idSeccionFoto = '".seguridad_sql($idSeccionFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['NombreArchivo'];
		}
		function obtenerIdentificador($idSeccionFoto){
			$sql=mysql_query("SELECT Identificador FROM SeccionFoto WHERE idSeccionFoto = '".seguridad_sql($idSeccionFoto)."'");
			$col = mysql_fetch_array($sql);
			return $col['Identificador'];
		}
	}