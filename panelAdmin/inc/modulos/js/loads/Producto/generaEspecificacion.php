<?php



$dir=explode('inc',dirname(__FILE__));
	require_once($dir[0]."inc/controlador.php");

	$ultimaEspecificacion = $_POST['ultimaEspecificacion'];

	$sql2 = mysql_query("SELECT idProductoAtributo FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($_POST['especificacion1'])."'");

	$col2 = mysql_fetch_array($sql2);

	$idProhibida1 = $col2['idProductoAtributo'];

	$sql2 = mysql_query("SELECT idProductoAtributo FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($_POST['especificacion2'])."'");

	$col2 = mysql_fetch_array($sql2);

	$idProhibida2 = $col2['idProductoAtributo'];

	$sql2 = mysql_query("SELECT idProductoAtributo FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($_POST['especificacion3'])."'");

	$col2 = mysql_fetch_array($sql2);

	$idProhibida3 = $col2['idProductoAtributo'];

	$sql2 = mysql_query("SELECT idProductoAtributo FROM ProductoAtributoDetalle WHERE idProductoAtributoDetalle = '".seguridad_sql($_POST['especificacion4'])."'");

	$col2 = mysql_fetch_array($sql2);

	$idProhibida4 = $col2['idProductoAtributo'];

	echo'<select name="detalle'.$ultimaEspecificacion.'">';

	$sql = mysql_query("SELECT ProductoAtributo.detalle as nombreAtributo,ProductoAtributoDetalle.detalle as nombreDetalle,ProductoAtributoDetalle.idProductoAtributoDetalle FROM ProductoAtributoDetalle inner join ProductoAtributo on ProductoAtributoDetalle.idProductoAtributo = ProductoAtributo.idProductoAtributo WHERE ProductoAtributo.idProductoAtributo != '".$idProhibida1."' AND ProductoAtributo.idProductoAtributo != '".$idProhibida2."' AND ProductoAtributo.idProductoAtributo != '".$idProhibida3."' AND ProductoAtributo.idProductoAtributo != '".$idProhibida4."'");

	

	if(mysql_num_rows($sql))

	{

		while($col = mysql_fetch_array($sql))

		{

			echo '<option value="'.$col['idProductoAtributoDetalle'].'">'.$col['nombreAtributo'].' '.$col['nombreDetalle'].'</option>';

		}

	}

	echo'</select>';




?>