if(!crearDivRespuesta){function crearDivRespuesta(elemento){var aleatorio=Math.floor(Math.random()*90+10);$('<div id="cargaform'+aleatorio+'"></div>').insertBefore(elemento);return '#cargaform'+aleatorio}}
function cargaStockProducto(idProducto,idrel_Es_Es,retorno){var parametros={"idProducto":idProducto,"idrel_Es_Es":idrel_Es_Es};$.ajax({url:ruta+"panelAdmin/inc/modulos/js/loads/Pedido/compruebaStockProducto.php",data:parametros,type:'post',success:function(respuesta){retorno(respuesta)},error:function(){alert("Error")}})}
function subir_producto_al_carro(idProducto,idrel_Es_Es,cantidad){cargaStockProducto(idProducto,idrel_Es_Es,function(stock){if(parseInt(stock)>=parseInt(cantidad))
{if(cantidad>=1&&cantidad%1==0)
{$('#divCarro').load(ruta+'panelAdmin/inc/modulos/js/loads/Pedido/AccionCarro.php',{idProducto:idProducto,cantidad:cantidad,idrel_Es_Es:idrel_Es_Es},function(){recargar_carro();setTimeout(function(){abrirCarro()},1000)})}else alert("Ingrese una cantidad mayor a 0")}else alert("No tenemos este producto disponible para "+cantidad+" unidades")})}
function carroQuitarProducto(idProducto){var divRespuesta=crearDivRespuesta('#divCarro');$(divRespuesta).load(ruta+'panelAdmin/inc/modulos/js/loads/Pedido/quitarProductoCarro.php',{idProducto:idProducto},function(){recargar_carro()})}
function recargar_carro(){$('#divCarro').load(ruta+'inc/modulos/vistas/estructura/carro.php')}
function seleccionMetodoEnvio(idMetodoEnvio){var divRespuesta=crearDivRespuesta('body');$(divRespuesta).load(ruta+'panelAdmin/inc/modulos/js/loads/Pedido/cargarCostoEnvio.php',{idMetodoEnvio:idMetodoEnvio})}
function seleccionCostoEnvio(idCostoEnvio){var divRespuesta=crearDivRespuesta('#divCarro');$(divRespuesta).load(ruta+'panelAdmin/inc/modulos/js/loads/Pedido/seleccionCostoEnvio.php',{idCostoEnvio:idCostoEnvio});$('#modalCostoEnvio').modal('hide')}
function abrirCarro()
{
	$('.carro').toggleClass('open');
}