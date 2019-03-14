<?php
$Configuracion = array();
$sql = mysql_query("SELECT * FROM VariablesConfiguracion");
while($col = mysql_fetch_array($sql))
{
	$Configuracion[$col['Nombre']] = $col['detalle'];
}
mysql_set_charset('utf8'); // En mysql establecer utf8_general_ci
date_default_timezone_set("America/Santiago");
$fecha=date('Y-m-d');
$ruta = $Configuracion['Ruta'];
define('URL',explode($Configuracion['CarpetaPanel'],getcwd())[0]);
if(explode('/',explode('httpdocs',getcwd())[1])[1] == $Configuracion['CarpetaPanel']) $ruta .= $Configuracion['CarpetaPanel'].'/';

$Informacion = array();
$sql = mysql_query("SELECT * FROM VariablesInformacion");
while($col = mysql_fetch_array($sql)){
	$Informacion[$col['Nombre']] = $col['Valor'];
}

$Sufijo=$Informacion['Sufijo'];
$sufijoTitulo=$Informacion['Sufijo'];
?>