function cerrarglobo(elemento){
	$(elemento).parent().css('transition','inherit');
	$(elemento).parent().fadeOut("slower",function(){$(this).remove();});
}
function crearDivRespuesta(elemento)
{
	var aleatorio = Math.floor(Math.random() * 90 + 10);
	$('<div id="cargaform'+aleatorio+'"></div>').insertBefore(elemento);
	return '#cargaform'+aleatorio;
}
function cargadorOn()
{
	$(".se-pre-con").fadeIn("slow");;
}
function cargadorOff()
{
	$(".se-pre-con").fadeOut("slow");;
}