<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertBefore( "form#loginForm");
	$('form#loginForm').submit(function(){
		var usuario = $('form#loginForm input[name="usuario"]').val();	
		var contrasena = $('form#loginForm input[name="contrasena"]').val();	
		var redirect = '<?php echo $Configuracion['Ruta']; ?>'
	$('#cargador_php_login').load('<?php echo $ruta.$Configuracion['CarpetaPanel'] ?>/inc/modulos/js/loads/Usuarios/login.php', {usuario: usuario, contrasena: contrasena,redirect:redirect });	
		return false;
	});
</script>