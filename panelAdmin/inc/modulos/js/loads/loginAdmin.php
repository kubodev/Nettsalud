<?php
require_once("../../../controlador.php");
$sql = mysql_query("SELECT * FROM UsuariosAdmin WHERE Usuario = '".seguridad_sql($_POST['Usuario'])."' AND Contrasena = '".md5($_POST['Contrasena'])."'");
if(mysql_num_rows($sql)){
	$col = mysql_fetch_array($sql);
	$_SESSION['idUsuariosAdmin'] = $col['idUsuariosAdmin'];
	redirect("../");
} else MsjError("Datos de acceso incorrectos.");
?>