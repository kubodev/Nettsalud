<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	$idMembresia = $_GET['idMembresia'];
	$_SESSION['idMembresia'] = $idMembresia;
	$rand = rand(111,999);
	$OC = date("Y").date("m").date("d").date("H").date("i").date("s").$rand;
	$sql = mysql_query("SELECT costo FROM Membresia WHERE idMembresia = '".seguridad_sql($idMembresia)."'");
	$col = mysql_fetch_array($sql);
	$MedioPago->transaccion($OC,1,$col['costo'],$_SESSION['idUsuarios'],$idMembresia);
	?>