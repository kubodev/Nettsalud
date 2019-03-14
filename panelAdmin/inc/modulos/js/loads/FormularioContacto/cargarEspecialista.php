<?
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");
if($_POST['Especialidad'] == "Otra")
{	
	echo '<option selected disabled>-- Seleccione especialista --</option>';
	echo '<option>Cualquiera</option>';
	foreach($CategoriaProductos->obtenerProductos() as $idProducto)
	{
		echo '<option>'.$Producto->obtenerInformacion($idProducto)['Nombre'].'</option>';
	}
}
else
{
	echo '<option selected disabled>-- Seleccione especialista --</option>';
	echo '<option>Cualquiera</option>';
	foreach($CategoriaProductos->obtenerProductos($_POST['Especialidad']) as $idProducto)
	{
		echo '<option>'.$Producto->obtenerInformacion($idProducto)['Nombre'].'</option>';
	}
}