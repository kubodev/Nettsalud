<?php 
mysql_query("DELETE FROM ProductoAtributoDetalle WHERE idProductoAtributo = '".seguridad_sql($_GET['idProductoAtributo'])."'");
mysql_query("DELETE FROM ProductoAtributo WHERE idProductoAtributo = '".seguridad_sql($_GET['idProductoAtributo'])."'");
redirect("../");
?>