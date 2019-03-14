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
	$('select[name="Especialidad"]').change(function(){
		cargadorOn();
		$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/FormularioContacto/cargarEspecialista.php',
	            data:form.serialize(),//only input
	            success: function(response){
	            	cargadorOff();
	                $('select[name="Especialista"]').html(response);
	                $('select[name="Especialista"]').removeAttr("disabled");
	            }
	        });
	});
	$("<div id='cargador_php_formc'></div>" ).insertBefore( "form#contacto" );
	$('form#contacto').submit(function(){
		if($("form#contacto")[0].checkValidity()) 
		{ //Validacion HTML5
			cargadorOn();
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/FormularioContacto/anular_reserva.php',
	            data:form.serialize(),//only input
	            success: function(response){
	                document.getElementById('cargador_php_formc').innerHTML = response;
	                $(window).scrollTop($('#cargador_php_formc').offset().top);  
	                cargadorOff();
	            }
	        });
			return false;
		}
	});
	$('input[name="Reagendar"]').change(function(){
		if ($(this).is(':checked')&& $(this).val() == 1)
		{
			$('.fecha').fadeIn("slower");
		} else $('.fecha').fadeOut("slower");
	});
</script>
