<script>
	var form=$("#trabaja_con_nosotros");


	$("<div id='cargador_php_formc'></div>" ).insertBefore( "form#trabaja_con_nosotros" );
	form.submit(function(){
		var formData = new FormData(form[0]);
		if($("form#trabaja_con_nosotros")[0].checkValidity()) 
		{ //Validacion HTML5
			cargadorOn();
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/FormularioContacto/enviar_trabaja_con_nosotros.php',
	            data:formData,//only input
	            processData: false,
				contentType: false,
	            success: function(response){
	            	cargadorOff();
	                document.getElementById('cargador_php_formc').innerHTML = response;  
	            }
	        });
			return false;
		}
	});
</script>
