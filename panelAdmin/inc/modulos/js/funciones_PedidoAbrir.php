<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertAfter( "select[name='idEstadoPedido']");
	$("select[name='idEstadoPedido']").change(function(){
		var idEstadoPedido = $('select[name="idEstadoPedido"] option:selected').val();	
		var idPedido = <?php echo $idPedido; ?>;
		$('#cargador_php_login').load('<?php echo $ruta; ?>/inc/modulos/js/loads/Pedido/cambiarEstado.php', {idEstadoPedido: idEstadoPedido,idPedido:idPedido });	
		return false;
	});
	$("select[name='idEstadoPago']").change(function(){
		var idEstadoPago = $('select[name="idEstadoPago"] option:selected').val();	
		var idPedido = <?php echo $idPedido; ?>;
		$('#cargador_php_login').load('<?php echo $ruta; ?>/inc/modulos/js/loads/Pedido/cambiarEstadoPago.php', {idEstadoPago: idEstadoPago,idPedido:idPedido });	
		return false;
	});
</script>