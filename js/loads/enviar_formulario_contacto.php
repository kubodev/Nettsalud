<?php
require_once("../../inc/controlador.php");
if($debug == 1) $destinatario = '';
else $destinatario = $Configuracion['Email'];

$msj = 'Ha llegado un ticket de contacto de '.$_POST['nombre'].'('.$_POST['email'].'),
Telefono: '.$_POST['telefono'].'

'.$_POST['mensaje'].'
';
mail($destinatario,'Ticket: '.$_POST['nombre'].'',$msj,"From: ".$_POST['email']." <".$_POST['email'].">");
MsjAprob("Ticket de contacto enviado, te responderemos a tu e-mail a la brevedad!");
?>