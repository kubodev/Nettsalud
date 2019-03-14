<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertAfter( "select[name='idEstadoFormularioContacto']");
	$("select[name='idEstadoFormularioContacto']").change(function(){
		var idEstadoFormularioContacto = $('select[name="idEstadoFormularioContacto"] option:selected').val();	
		var idFormularioContacto = <?php echo $idFormularioContacto; ?>;
		$('#cargador_php_login').load('<?php echo $ruta; ?>/inc/modulos/js/loads/FormularioContacto/cambiarEstado.php', {idEstadoFormularioContacto: idEstadoFormularioContacto,idFormularioContacto:idFormularioContacto });	
		return false;
	});
</script>