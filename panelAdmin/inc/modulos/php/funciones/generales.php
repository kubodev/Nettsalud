<?php
function seguridad_sql($var){
return mysql_real_escape_string($var);
}
function ObtenerEmbed($Link)
{
    $a = explode('?v=',$Link);

    return 'https://www.youtube.com/embed/'.$a[1];
}
function seguridad_php($var){
return stripslashes(htmlentities($var, ENT_QUOTES, "UTF-8"));
}

function IP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function redirect($url){
echo '<script type="text/javascript"> window.location = "'.$url.'"</script>';
return 0;
}

function MsjAprob($texto){
	echo '<div class="alerta exito fadeIn" role="alert">'.$texto.'<a href="#" class="right" onclick="javascript:cerrarglobo(this)"><span class="glyphicon glyphicon-remove"></span></a></div>';
}
function MsjError($texto){
	echo '<div class="alerta error fadeIn" role="alert">'.$texto.'<a href="#" class="right" onclick="javascript:cerrarglobo(this)"><span class="glyphicon glyphicon-remove"></span></a></div>';
}
function GuardarFotoMin($medida,$destino,$archivo)
{
    $fn = $archivo;
                                $size = getimagesize($fn);
                                $ratio = $size[0]/$size[1]; // width/height
                                if( $ratio > 1) {
                                    $width = $medida;
                                    $height = $medida/$ratio;
                                }
                                else {
                                    $width = $medida*$ratio;
                                    $height = $medida;
                                }
                                $src = imagecreatefromstring(file_get_contents($fn));
                                $dst = imagecreatetruecolor($width,$height);
                                imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
                                imagedestroy($src);
                                imagepng($dst,$destino); // adjust format as needed
                                imagedestroy($dst);
}
function cortartxt($texto, $tamano) {
$txt1 = $texto;
$contador = 0;
 
$arrayTexto = explode(' ',$texto);
$texto = '';
 
while($tamano >= strlen($texto) + strlen(@$arrayTexto[$contador])){
    $texto .= ' '.@$arrayTexto[$contador];
    $contador++;
}
if(strlen($txt1) > $tamano) { return $texto.'...'; } else return $texto;
}
function cortartxt_sp($texto, $tamano) {
$txt1 = $texto;
$contador = 0;
 
$arrayTexto = explode(' ',$texto);
$texto = '';
 
while($tamano >= strlen($texto) + strlen(@$arrayTexto[$contador])){
    $texto .= ' '.@$arrayTexto[$contador];
    $contador++;
}
return $texto;
}
function cadenatexto($num)
{
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
	$cad = ""; 
	for($i=0;$i<$num;$i++) 
	{ 
		$cad .= substr($str,rand(0,62),1); 
	} 
	return $cad;
}
function limpiarurl($str)
{
    $no_permitidas= array ("'","    "," ","    "," ",",","(",")","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("","","-","-","-",".","","","a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$str);
    return $texto;
}
function Fecha($fecha){
	$anio=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);
	$hora=substr($fecha,11,5);

	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	if($hora!=null){
		if($dia==date('d') and $mes=date('m') and $anio=date('Y')){
			return "Hoy a las ".$hora." hrs.";
		}if($dia==date('d')-1 and $mes=date('m') and $anio=date('Y')){
			return "Ayer a las ".$hora." hrs.";
		}else{
			return $dia." de ".$arrayMeses[$mes-1]." del ".$anio." a las ".$hora;
		}
	}else{
		return $dia." de ".$arrayMeses[$mes-1]." del ".$anio;
	}
}
function nombreAdmin($idUsuariosAdmin){
	$sql=mysql_query("SELECT Usuario FROM UsuariosAdmin WHERE idUsuariosAdmin='$idUsuariosAdmin'");
	$col=mysql_fetch_array($sql);
	return $col['Usuario'];
}
function extensionArchivo($nombreArchivo)
{
	$trozos = explode(".", $nombreArchivo); 
	return end($trozos); 
}
function esImagen($nombreArchivo)
{
	if(extensionArchivo($nombreArchivo) == "gif" || extensionArchivo($nombreArchivo) == "pjpeg" || extensionArchivo($nombreArchivo) == "jpeg" || extensionArchivo($nombreArchivo) == "jpg" || extensionArchivo($nombreArchivo) == "png" || extensionArchivo($nombreArchivo) == "bmp" || extensionArchivo($nombreArchivo) == "JPEG" || extensionArchivo($nombreArchivo) == "JPG" || extensionArchivo($nombreArchivo) == "PNG")
	{
		return true;
	} else return false;
}
function esPdf($nombreArchivo)
{
    if(extensionArchivo($nombreArchivo) == "PDF" || extensionArchivo($nombreArchivo) == "Pdf" || extensionArchivo($nombreArchivo) == "pdf")
    {
        return true;
    } else return false;
}
function esDoc($nombreArchivo)
{
    if(extensionArchivo($nombreArchivo) == "DOC" || extensionArchivo($nombreArchivo) == "doc"|| extensionArchivo($nombreArchivo) == "docx"|| extensionArchivo($nombreArchivo) == "DOCX")
    {
        return true;
    } else return false;
}
function ExtraerFechaDB()
{
$a = getdate();
$b = ''.@$a[year].'-'.@$a[mon].'-'.@$a[mday].'';
return $b;
}
function ExtraerFechaHoraDB()
{
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$hora = date("H");
$minuto = date("i");
$segundo = date("s");
$a = ''.$ano.'-'.$mes.'-'.$dia.' '.$hora.':'.$minuto.':'.$segundo.'';
return $a;
}
function paginacion($items){
	
	if(isset($_GET['pagina'])) $pagina = $_GET['pagina']; else $pagina = 1;
	$pag_numeroPaginas = ceil(count($items)/12);
	$pag_posDesde = (($pagina*12)-(12-1));
	$pag_posHasta = $pagina*12;
	return array('posDesde' => $pag_posDesde,'posHasta' => $pag_posHasta,'numeroPaginas' => $pag_numeroPaginas);
}
function formatoMoneda($numero)
{
	return '$'.number_format($numero);
}
function sanear_string($string)
{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array("¨", "º", "-", "~",
             "#", "@", "|", "!",
             "·", "$", "%", "&",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );

    $string = strtolower($string);
 
 
    return $string;
}
?>