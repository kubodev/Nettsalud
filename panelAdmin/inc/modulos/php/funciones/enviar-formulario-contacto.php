<?php
include(__DIR__."/inc/controlador.php");

if($debug == 1) $destinatario = 'programacion@mmwebz.com';
else $destinatario = $emailContacto;

$msj = 'Ha llegado un ticket de contacto de '.$_POST['nombre'].'('.$_POST['email'].'),
Telefono: '.$_POST['tlf'].'

'.$_POST['texto'].'
';
mail($destinatario,'Ticket: '.$_POST['nombre'].'',$msj,"From: ".$_POST['email']." <".$_POST['email'].">");
MsjAprob("Ticket de contacto enviado, te responderemos a tu e-mail a la brevedad!");
?>