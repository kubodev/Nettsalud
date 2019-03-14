<?php
if(isset($_POST['enviar']))
{
	$sql = mysql_query("SELECT * FROM VariablesInformacion ORDER BY idTipoDescripcion_campo ASC");
	while($col = mysql_fetch_array($sql))
	{
		mysql_query("UPDATE VariablesInformacion SET Valor = '".seguridad_sql($_POST['VariablesInformacion'.$col['idVariablesInformacion']])."' WHERE idVariablesInformacion = 
			'".$col['idVariablesInformacion']."'");
	}
	MsjAprob("Datos guardados exitosamente");
}