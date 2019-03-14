function cargadorOn()
{
	$('#cargando').fadeIn("slower");
}
function cargadorOff()
{
	$('#cargando').fadeOut("slower");
}
/* Script para abrir modales */
var abb = [];
function ab(id)
{
	if(abb[id] == 1)
	{
		document.getElementById('contadm'+id).style.display = 'block';
		document.getElementById('contadm'+id).style.height = 'inherit';
		document.getElementById('contadm'+id).style.transform = 'scaleY(1)';
		abb[id] = 0;
	}
	else
	{
		setTimeout(function(){document.getElementById('contadm'+id).style.height = '0';},200);
		setTimeout(function(){document.getElementById('contadm'+id).style.display = 'none';},300)
		document.getElementById('contadm'+id).style.transform = 'scaleY(0)';
		abb[id] = 1;			
	}
}
/*******************/
/* Script para cargar los otros ficheros .js */
function f(b){
e=document;
var a=e.getElementsByTagName("head")[0];
a|| (a=e.body.parentNode.appendChild(e.createElement(" head")));
a.appendChild(b)}function _loadJs(b){var a=e.createElement("script");
a.type="text/javascript";a.charset="UTF-8";a.src=b;f(a)
}
function importarJs(archivo){
e=document;
var a=e.createElement("script");
a.type="text/javascript";
a.charset="UTF-8";
a.src=archivo;
f(a)
}

/**********************/

/* Nave Index */
function ejecutarNaveIndex()
{
	setInterval(function(){if(nave1==0) {$('.nave1').css("top","180px");nave1=1;} else {$('.nave1').css("top","186px");nave1=0;}},1000);
	setTimeout(function(){$('.nave1').css("left","100px");},5000);
}


/**********************/

/* Editor de texto */
function cargarEditor(elemento)
{
	$( document ).ready(function() 
	{
		cargadorOn();
		
		setTimeout(function(){
			$(function(){
			  $(elemento).editable({
					inlineMode: false,
					imageUploadParam: 'file',
					imageUploadURL: ruta+'inc/modulos/js/loads/subir_img_froala.php',
					imageUploadParams: {id: 'my_editor'}
			  })
			  .on('editable.imageError', function (e, editor, error) {
					if (error.code == 0) { alert("0"); }
					else if (error.code == 1) { alert("Bad link"); }
					else if (error.code == 2) { alert("No link in upload response"); }
					else if (error.code == 3) { alert("Error during image upload"); }
					else if (error.code == 4) { alert("Parsing response failed"); }
					else if (error.code == 5) { alert("Image too text-large"); }
					else if (error.code == 6) { alert("Invalid image type"); }
					else if (error.code == 7) { alert("Image can be uploaded only to same domain in IE 8 and IE 9"); }
			  });
			});
			cargadorOff();
			
		},500); // Espera 1500ms a que los JS carguen
	});
}
/**********/
function abrirImg(id) //Click editar foto
{
	$('#fo'+id).fadeIn("slower");
}
function abrirImgs(id) //Click editar slider
{
	$('#sl'+id).fadeIn("slower");
}
function agregarElemento(idElementoGrupo)
{
	var aleatorio = Math.floor(Math.random() * 90 + 10);
	var divRespuesta = $('<div id="cargaform'+aleatorio+'"></div>').insertAfter($("ul#elementoGrupo"+idElementoGrupo+" li.elemento").last());
	$(divRespuesta).load(ruta+'inc/modulos/js/loads/Seccion/agregarElemento.php', {
		idElementoGrupo:idElementoGrupo
	});
}
function borrarElemento(idElemento)
{
	if(confirm('¿Realmente desea eliminar este elemento? Luego de eliminarlo no podrá deshacer la acción.')) 
	{
		$('#elemento'+idElemento).fadeOut("slower");
		var divRespuesta = crearDivRespuesta('#elemento'+idElemento);
		$(divRespuesta).load(ruta+'inc/modulos/js/loads/Seccion/borrarElemento.php', {idElemento: idElemento });
	}
}
function agregarSliderFoto(idSeccion)
{
	var aleatorio = Math.floor(Math.random() * 90 + 10);
	var divRespuesta = $('<div id="cargaform'+aleatorio+'"></div>').insertAfter($("ul#SliderFotos li").last());
	$(divRespuesta).load(ruta+'inc/modulos/js/loads/Seccion/agregarSliderFoto.php', {
		idSeccion:idSeccion
	});
}
function borrarSliderFoto(idSliderFoto)
{
	if(confirm('¿Realmente desea eliminar esta imagen? Luego de eliminarla no podrá deshacer la acción.')) 
	{
		$('#itemSlider'+idSliderFoto).fadeOut("slower");
		var divRespuesta = crearDivRespuesta('#itemSlider'+idSliderFoto);
		$(divRespuesta).load(ruta+'inc/modulos/js/loads/Seccion/borrarSliderFoto.php', {idSliderFoto: idSliderFoto });
	}
}
function cerrarglobo(elemento)
{
	$(elemento).parent().css('transition','inherit');
	$(elemento).parent().fadeOut("slower",function(){$(this).remove();});
}
function crearDivRespuesta(elemento)
{
	var aleatorio = Math.floor(Math.random() * 90 + 10);
	$('<div id="cargaform'+aleatorio+'"></div>').insertBefore(elemento);
	return '#cargaform'+aleatorio;
}
function confirmarUrl(url,pregunta){
	if(confirm(pregunta)){
		window.location=url;
	}else{	}	
}
function borrarFotoAlbum(idAlbumFoto)
{
	if(confirm('¿Realmente desea eliminar esta imagen? Luego de eliminarla no podrá deshacer la acción.')) 
	{
		$('#foto'+idAlbumFoto).fadeOut("slower");
		var divRespuesta = crearDivRespuesta('#foto'+idAlbumFoto);
		$(divRespuesta).load(ruta+'inc/modulos/js/loads/Galerias/borrarAlbumFoto.php', {idAlbumFoto: idAlbumFoto });
	}
}