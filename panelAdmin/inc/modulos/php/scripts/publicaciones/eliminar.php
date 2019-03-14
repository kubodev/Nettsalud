<?php
mysql_query("DELETE FROM Publicacion WHERE idPublicacion = '".seguridad_sql($_GET['idPublicacion'])."'");
redirect("../");