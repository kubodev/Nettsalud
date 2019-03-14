<?php 
mysql_query("DELETE FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($_GET['idProductoAtributoDetalle'])."'");
redirect("../");
?>