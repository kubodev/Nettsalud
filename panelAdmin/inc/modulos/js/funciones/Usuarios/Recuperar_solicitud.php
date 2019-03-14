<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
	$("<div id='RecuperarForm'></div>").insertBefore( "form#RecuperarForm");
	$('form#RecuperarForm').submit(function(){
		var email = $('form#RecuperarForm input[name="email"]').val();
	$('#RecuperarForm').load('<?php echo $ruta.$Configuracion['CarpetaPanel'] ?>/inc/modulos/js/loads/Usuarios/solicitud_recuperar_contrasena.php', {email: email});	
		return false;
	});
</script>