<?
$dir=explode('inc',dirname(__FILE__));
$permiteAcceso=1;
require_once($dir[0]."inc/controlador.php");
if($Configuracion['Debug'] == 1) $destinatario = 'matias@mmw.cl';
else $destinatario = $Informacion['Email'];


$msj = 'Ha llegado una nueva solicitud de anulación de hora:

';
$_POST['Especialidad'] = $CategoriaProductos->obtenerNombre($_POST['Especialidad']);
foreach($_POST as $clave => $valor)
{
	$msj .= $clave.': '.$valor.'
';
}
//mail('ygoncalvez309@gmail.com','NettSalud: Nueva solicitud anulación de hora',$msj,"From: ".$destinatario." <".$destinatario.">");

mail('contacto@nettsalud.cl','NettSalud: Nueva solicitud reserva de hora',$msj,"From: ".$destinatario." <".$destinatario.">");
mail('recepcion@nettsalud.cl','NettSalud: Nueva solicitud reserva de hora',$msj,"From: ".$destinatario." <".$destinatario.">");
MsjAprob("Hemos recibido tu solicitud, confirmaremos tu hora a tu teléfono o e-mail");
?>