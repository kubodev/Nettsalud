<script>
	var form=$("#contacto");
	<?php
	if($Configuracion['Debug'] == 1){ ?>
		$('form#contacto input, form#contacto textarea').each(
			function(index){  
				var input = $(this);
				if(input.attr('type') == "email") input.val('email@pruebas.cl');
				else input.val('Testing '+input.attr('name'));
			}
		);
		<?php
	}
	?>
	$("<div id='cargador_php_formc'></div>" ).insertBefore( "form#contacto" );
	$('form#contacto').submit(function(){
		if($("form#contacto")[0].checkValidity()) 
		{ //Validacion HTML5
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/FormularioContacto/enviar.php',
	            data:form.serialize(),//only input
	            success: function(response){
	                document.getElementById('cargador_php_formc').innerHTML = response;  
	            }
	        });
			return false;
		}
	});
</script>
