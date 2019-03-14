<?php
$idProductoMarca = $_GET['idProductoMarca'];
mysql_query("DELETE FROM ProductoMarca WHERE idProductoMarca = '".$idProductoMarca."'");
redirect("../");
?>