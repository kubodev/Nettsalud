<?php
$dir=explode('inc',dirname(__FILE__));
//ini_set('session.save_path',$dir[0]."inc/php_session/"); 
session_start();

/* Variables de Configuración */
require_once("modulos/php/var/conexionSql.php");
require_once("modulos/php/var/variables_generales.php");
/* Fin Variables de Configuración */

/* Funcion General */
require_once("modulos/php/funciones/generales.php");
/* Fin Funcion General */

/* Scripts */
if($sistema_de_idiomas==1) require_once("modulos/php/scripts/idiomas.php");
define('URL',explode($Configuracion['CarpetaPanel'],getcwd())[0]);
if(explode('/',explode('httpdocs',getcwd())[1])[1] == $Configuracion['CarpetaPanel']) require_once("modulos/php/scripts/controlAcceso.php");
/* Fin Scripts */

/* Clases */
require_once("modulos/php/clases/Secciones.php");
require_once("modulos/php/clases/SeccionFoto.php");
require_once("modulos/php/clases/Publicaciones.php");
require_once("modulos/php/clases/Slider.php");
require_once("modulos/php/clases/CategoriasProductos.php");
require_once("modulos/php/clases/Productos.php");
require_once("modulos/php/clases/MarcasProductos.php");
require_once("modulos/php/clases/Usuarios.php");
require_once("modulos/php/clases/Carro.php");
require_once("modulos/php/clases/Pedido.php");
require_once("modulos/php/clases/MedioPago.php");
require_once("modulos/php/clases/FormularioContacto.php");
require_once("modulos/php/clases/Album.php");
$seccion = new Seccion();
$Publicacion = new Publicacion();
$SeccionFoto = new SeccionFoto();
$Slider = new Slider();
$CategoriaProductos = new CategoriaProductos();
$Producto = new Productos();
$MarcaProductos = new MarcaProductos();
$Carro = new Carro();
$Usuarios = new usuarios();
$Pedido = new Pedido();
$MedioPago = new MedioPago();
$FormularioContacto = new FormularioContacto();
$Album = new Album();
// if($_SERVER['HTTP_HOST'] == "www.dominiocliente.cl" || $_SERVER['HTTP_HOST'] == "dominiocliente.cl") { redirect("aterrizaje"); exit(); }
?>