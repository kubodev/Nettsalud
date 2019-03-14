<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertBefore( "form#login");
	$('form#login').submit(function(){
		var email = $('form#login input[name="email"]').val();
	$('#cargador_php_login').load('<?php echo $ruta.$Configuracion['CarpetaPanel'] ?>/inc/modulos/js/loads/Usuarios/solicitud_recuperar_contrasena.php', {email: email});	
		return false;
	});
</script>