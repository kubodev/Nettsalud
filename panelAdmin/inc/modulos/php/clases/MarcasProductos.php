<?php
class MarcaProductos
{
	public function obtenerNombre($idProductoMarca)
	{
		$sql = mysql_query("SELECT nombre FROM ProductoMarca WHERE idProductoMarca = '".seguridad_sql($idProductoMarca)."'");
		$col = mysql_fetch_array($sql);
		return $col['nombre'];
	}
	public function obtenerImg($idProductoMarca)
	{
		$sql = mysql_query("SELECT img FROM ProductoMarca WHERE idProductoMarca = '".seguridad_sql($idProductoMarca)."'");
		$col = mysql_fetch_array($sql);
		return $col['img'];
	}
}