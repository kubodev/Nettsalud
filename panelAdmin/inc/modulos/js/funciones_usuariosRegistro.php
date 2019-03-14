<script>
var form=$("#nueva_cuenta");
$("<div id='cargador_php_formc'></div>" ).insertBefore( form );
	form.submit(function(){
		if(form[0].checkValidity()) 
		{ //Validacion HTML5
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta.$Configuracion['CarpetaPanel']; ?>/inc/modulos/js/loads/Usuarios/frontend_agregar.php',
	            data:form.serialize(),//only input
	            success: function(response){
	                document.getElementById('cargador_php_formc').innerHTML = response;  
	                window.scrollTo(0,0);
	            }
	        });
			return false;
		}
	});
</script>