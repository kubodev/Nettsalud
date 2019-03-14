<?php 
	require_once("../inc/controlador.php");
	unset($_SESSION);
	session_destroy();
	redirect("../loginAdmin");
?>