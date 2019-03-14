<?php
	$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");
	$sql = mysql_query("SELECT * FROM Elemento WHERE idElementoGrupo = '".seguridad_sql($_POST['idElementoGrupo'])."' ORDER BY idElemento DESC LIMIT 1");
	$col = mysql_fetch_array($sql);
	if(mysql_query("INSERT INTO Elemento (`idElementoGrupo`,`idSeccion`,`FotoNombreArchivo`,`TieneTitulo`,`TieneSubTitulo`,`TieneTexto`,`TieneLink`) VALUES ('".$col['idElementoGrupo']."','".$col['idSeccion']."','".$col['FotoNombreArchivo']."','".$col['TieneTitulo']."','".$col['TieneSubTitulo']."','".$col['TieneTexto']."','".$col['TieneLink']."')"))
	{
		$idElemento = mysql_insert_id();
		$dir=explode('inc',dirname(__FILE__));
		require_once($dir[0]."inc/modulos/vistas/backend/Seccion/adm-secciones-vistaElementoGrupo.php");
	} else MsjError("Error desconocido");

?>