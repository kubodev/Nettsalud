<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertBefore( "form#login");
	$('form#login').submit(function(){
		var email = $('form#login input[name="email"]').val();
		var contrasena = $('form#login input[name="contrasena"]').val();
		var contrasena_validar = $('form#login input[name="contrasena_validar"]').val();
		var cod = $('form#login input[name="cod"]').val();
	$('#cargador_php_login').load('<?php echo $ruta.$Configuracion['CarpetaPanel'] ?>/inc/modulos/js/loads/Usuarios/recuperar_contrasena.php', {email: email, contrasena: contrasena, contrasena_validar: contrasena_validar, cod:cod});	
		return false;
	});
</script>