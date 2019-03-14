<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	unset($_SESSION['subiendoFotos'][$_POST['idProducto']][$_POST['img']]);
	?>