<?php
$Configuracion = array();
$sql = mysql_query("SELECT * FROM VariablesInformacion");
while($col = mysql_fetch_array($sql)){
	$Configuracion[$col['Nombre']] = $col['Valor'];
}

$Sufijo=$Configuracion['Sufijo'];
$sufijoTitulo=$Configuracion['Sufijo'];

echo $_SERVER['QUERY_STRING'];