<?php
$idCodigoDescuento = $_GET['idCodigoDescuento'];
mysql_query("UPDATE CodigoDescuento SET Habilitado = '0' where idCodigoDescuento = '".seguridad_sql($idCodigoDescuento)."'");
redirect("../");
?>