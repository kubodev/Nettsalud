<?php
$idProductoCategoria = $_GET['idProductoCategoria'];
mysql_query("DELETE FROM rel_ProductoCategoria_ProductoCategoria WHERE idProductoCategoria_Hijo = '".$idProductoCategoria."' OR idProductoCategoria_Padre = '".$idProductoCategoria."'");
mysql_query("DELETE FROM ProductoCategoria WHERE idProductoCategoria = '".$idProductoCategoria."'");
redirect("../");
?>