<?php
mysql_query("DELETE FROM rel_Usuarios_UsuariosInformacion WHERE idUsuarios = '".seguridad_sql($_GET['idUsuarios'])."'");
mysql_query("DELETE FROM Usuarios WHERE idUsuarios = '".seguridad_sql($_GET['idUsuarios'])."'");
redirect('../');
?>