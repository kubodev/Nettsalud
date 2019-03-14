<?
$dir=explode('inc',dirname(__FILE__));
require_once($dir[0]."inc/controlador.php");
if($Configuracion['Debug'] == 1) $destinatario = 'matias@mmw.cl';
else $destinatario = $Informacion['Email'];


$msj = 'Ha llegado una nueva solicitud de inscripción al boletin informativo.

';
foreach($_POST as $clave => $valor)
{
	$msj .= $clave.': '.$valor.'
';
}
mail($destinatario,'Nueva solicitud de inscripción al boletin informativo',$msj,"From: ".$destinatario." <".$destinatario.">");
MsjAprob("Gracias por ponerte en contacto con Kuss");
?>