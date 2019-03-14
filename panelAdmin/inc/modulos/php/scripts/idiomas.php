<?php
$idiomas = array("es");

if(!isset($_SESSION["idioma"])){
	$_SESSION["idioma"]="";	
}

if(isset($_GET["idioma"])) {
	//El sistema de idiomas debe ser SIEMPRE con el standard internacional ISO_639-1
	if(in_array($_GET["idioma"],$idiomas)){
		$_SESSION["idioma"]=$_GET["idioma"];
		if($_SESSION['idioma'] == "es") $_SESSION["idioma"] = ""; // Cuando el idioma es el español (por defecto) se debe dejar en blanco la variable
	}
}
?>	