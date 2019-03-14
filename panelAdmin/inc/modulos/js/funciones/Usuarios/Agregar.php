<script>
	
	$("<div id='cargador_php_formc'></div>" ).insertBefore( "form#formRegistro" );
	$('form#formRegistro').submit(function(){
		if($("form#formRegistro")[0].checkValidity()) 
		{ //Validacion HTML5
			var form=$("#formRegistro");
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta.$Configuracion['CarpetaPanel']; ?>/inc/modulos/js/loads/Usuarios/frontend_agregar.php',
	            data:form.serialize(),//only input
	            success: function(response){
	            	if (response % 1 == 0) // Registro en Publicar
	            	{
	            		window.location = ruta+"publicacion/?idPublicacion="+response;
	            	}
	            	else
	            	{
	                	document.getElementById('cargador_php_formc').innerHTML = response;  
	                }
	            }
	        });
			return false;
		}
	});
</script>
