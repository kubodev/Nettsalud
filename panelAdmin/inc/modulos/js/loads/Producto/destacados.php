<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$sql = mysql_query("SELECT * FROM ProductoDestacado");
	while($col = mysql_fetch_array($sql))
	{
		mysql_query("UPDATE ProductoDestacado SET idProducto = '".seguridad_sql($_POST['ProductoDestacado'.$col['idProductoDestacado']])."' WHERE idProductoDestacado = '".$col['idProductoDestacado']."'");
	}
	MsjAprob("Cambios guardados satisfactoriamente");

?>