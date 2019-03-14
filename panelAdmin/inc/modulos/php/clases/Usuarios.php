<?php
class usuarios{
	function atributo($idUsuarios){
		$sql = mysql_query("SELECT * FROM Usuarios inner join rel_Usuarios_UsuariosInformacion on Usuarios.idUsuarios = rel_Usuarios_UsuariosInformacion.idUsuarios WHERE Usuarios.idUsuarios = '".$idUsuarios."'");
		return mysql_fetch_array($sql);
	}
	public function obtenerInformacion($nombreDetalle,$idUsuarios)
	{
		$sql = mysql_query("SELECT rel_Usuarios_UsuariosInformacion.detalle as Detalle FROM rel_Usuarios_UsuariosInformacion inner join UsuariosInformacion on rel_Usuarios_UsuariosInformacion.idUsuariosInformacion = UsuariosInformacion.idUsuariosInformacion WHERE UsuariosInformacion.detalle = '".seguridad_sql($nombreDetalle)."' AND rel_Usuarios_UsuariosInformacion.idUsuarios = '".seguridad_sql($idUsuarios)."'");
		$col = mysql_fetch_array($sql);
		return $col['Detalle'];
	}
	function nombreMascota($idUsuarios){
		$sql = mysql_query("SELECT detalle FROM Usuarios inner join Mascota WHERE Mascota.idMascota=Usuarios.idMascota and idUsuarios='$idUsuarios'");
		if(mysql_num_rows($sql)){
			$col=mysql_fetch_array($sql);
			return $col['detalle'];
		}
	}
	public function estaLogeado()
	{
		if(isset($_SESSION['idUsuarios'])) return true; else return false;
	}
	public function login($idUsuarios)
	{
		$_SESSION['idUsuarios'] = $idUsuarios;
	}
	public function comprobarContrasenaLogin($usuario,$contrasena)
	{
		$sql = mysql_query("SELECT * FROM rel_Usuarios_UsuariosInformacion as tablaUsuario inner join rel_Usuarios_UsuariosInformacion as tablaPassw on tablaUsuario.idUsuarios = tablaPassw.idUsuarios	inner join Usuarios on tablaUsuario.idUsuarios = Usuarios.idUsuarios WHERE tablaUsuario.detalle = '".seguridad_sql($usuario)."' AND tablaPassw.detalle = '".md5($contrasena)."' GROUP BY tablaUsuario.idrel_Usuarios_UsuariosInformacion");

		if(mysql_num_rows($sql)) { $col = mysql_fetch_array($sql); return $col['idUsuarios']; } else return false; 
	}
	public function DestruirSesion()
	{
		unset($_SESSION['idUsuarios']);
	}
}

?>