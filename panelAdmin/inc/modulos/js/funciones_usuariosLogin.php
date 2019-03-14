<script type="text/javascript">
	$("<div id='cargador_php_login'></div>").insertBefore( "form#login");
	$('form#login').submit(function(){
		var usuario = $('form#login input[name="usuario"]').val();	
		var contrasena = $('form#login input[name="contrasena"]').val();	
		var redirect = '<?php echo $Configuracion['Ruta'].$Configuracion['RutaPerfilUsuario']; ?>'
	$('#cargador_php_login').load('<?php echo $ruta.$Configuracion['CarpetaPanel'] ?>/inc/modulos/js/loads/Usuarios/login.php', {usuario: usuario, contrasena: contrasena,redirect:redirect });	
		return false;
	});
</script>