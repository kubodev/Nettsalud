<?php
$idProducto = seguridad_sql($_GET['idProducto']);
mysql_query("DELETE FROM ProductoFoto WHERE idProducto = '".$idProducto."'");
mysql_query("DELETE FROM rel_ProductoInformacion_Producto WHERE idProducto = '".$idProducto."'");
mysql_query("DELETE FROM rel_Producto_ProductoCategoria WHERE idProducto = '".$idProducto."'");
mysql_query("DELETE FROM Producto WHERE idProducto = '".$idProducto."'");
redirect("../");
?>