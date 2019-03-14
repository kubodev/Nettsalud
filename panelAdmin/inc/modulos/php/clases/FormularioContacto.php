<?php
class FormularioContacto
{
	public function CantidadNoLeidos()
	{
		$sql = mysql_query("SELECT idFormularioContacto FROM FormularioContacto WHERE Leido = '0'");
		return mysql_num_rows($sql);
	}
	public function ObtenerInformacion($idFormularioContacto)
	{

			$array = array();

			$sql = mysql_query("SELECT * FROM rel_FormularioContacto_FormularioContactoInformacion WHERE idFormularioContacto = '".seguridad_sql($idFormularioContacto)."'");

			while($col = mysql_fetch_array($sql))

			{

				$sql2 = mysql_query("SELECT detalle FROM FormularioContactoInformacion WHERE idFormularioContactoInformacion = '".$col['idFormularioContactoInformacion']."'");

				$col2 = mysql_fetch_array($sql2);

				$array[$col2['detalle']] = $col['detalle'];

			}

			return $array;

	}
	public function ObtenerAtributo($idFormularioContacto)
	{
		$sql = mysql_query("SELECT * FROM FormularioContacto WHERE idFormularioContacto = '".$idFormularioContacto."'");
		return mysql_fetch_array($sql);
	}
	public function ObtenerFormularios()
	{
		$array = array();

		$sql = mysql_query("SELECT * FROM FormularioContacto ORDER BY idFormularioContacto DESC");
		while($col = mysql_fetch_array($sql)) array_push($array,$col['idFormularioContacto']);
		return $array;
	}
	public function nombreEstado($idFormularioContacto)
	{
		$sql = mysql_query("SELECT detalle FROM EstadoFormularioContacto WHERE idEstadoFormularioContacto = '".$this->ObtenerAtributo($idFormularioContacto)['idEstadoFormularioContacto']."'");
		$col = mysql_fetch_array($sql);
		return $col['detalle'];
	}
	public function Leido($idFormularioContacto)
	{
		if($this->ObtenerAtributo($idFormularioContacto)['Leido'] == 1) return true; else return false;
	}
	public function ListarInformacion($idFormularioContacto)
	{
		$aux = array();
		$sql = mysql_query("SELECT * FROM FormularioContactoInformacion");
		while($col = mysql_fetch_array($sql))
		{
			$aux[$col['detalle']] = $this->ObtenerInformacion($idFormularioContacto)[$col['detalle']];
		}
		return $aux;
	}

}