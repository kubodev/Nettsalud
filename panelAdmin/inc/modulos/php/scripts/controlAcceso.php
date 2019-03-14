<?php
$dir=explode('httpdocs',getcwd());
$dir2 = explode('/',$dir[1]);
if($permiteAcceso!=1 && end($dir2) != "loads" && $permiteAcceso!=1)
{
	if(!isset($_SESSION['idUsuariosAdmin'])) { redirect($dominio.$ruta."loginAdmin"); exit(); }
}
?>