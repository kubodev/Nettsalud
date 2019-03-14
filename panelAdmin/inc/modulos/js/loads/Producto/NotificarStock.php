<?
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");
if($Configuracion['Debug'] == 1) $destinatario = 'matias@mmw.cl';
else $destinatario = $Informacion['Email'];



foreach($_POST as $clave => $valor)
{
	$msj .= $clave.': '.$valor.'
';
}
mail($destinatario,'['.$Producto->obtenerInformacion($_POST['idProducto'])['Codigo'].'] '.$Producto->obtenerInformacion($_POST['idProducto'])['Nombre'].' - Notificar stock',$msj,"From: ".$destinatario." <".$destinatario.">");
MsjAprob("Te notificaremos vía e-mail cuando contemos con nuevo stock");
?>