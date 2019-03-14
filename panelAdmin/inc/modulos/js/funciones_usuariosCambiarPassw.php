<script>
var form=$("#contrasena");
$("<div id='cargador_php_formc'></div>" ).insertBefore( form );
	form.submit(function(){
		if(form[0].checkValidity()) 
		{ //Validacion HTML5
			if($('#contrasena input[name="contrasena_nueva"]').val() == $('#contrasena input[name="contrasena_validar"]').val())
			{
				$.ajax({
		            type:"POST",
		            url:'<?php echo $ruta.$Configuracion['CarpetaPanel']; ?>/inc/modulos/js/loads/Usuarios/frontend_cambiarPassw.php',
		            data:form.serialize(),//only input
		            success: function(response){
		                document.getElementById('cargador_php_formc').innerHTML = response;  
		                window.scrollTo(0,0);
		            }
		        });
			} else alert("Las contraseñas no coinciden");
			return false;
		}
	});
</script>