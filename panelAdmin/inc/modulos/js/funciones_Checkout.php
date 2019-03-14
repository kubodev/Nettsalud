<script type="text/javascript">
	$(document).ready(function ()
	{

			var form=$("#pedidoFinal");
			$('form#pedidoFinal').submit(function(){
				var formData = new FormData(form[0]);
				if($("form#pedidoFinal")[0].checkValidity()) 
				{ //Validacion HTML5
					$.ajax({
			            type:"POST",
			            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/Pedido/GuardarDatosPersonales.php',
			            data:form.serialize(),//only input
			            success: function(response){
			            	$('#CargadorWP').load('<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/Pedido/EnviarPedido.php?idMetodoPago=1');
			            }
			        });
			        
					return false;
				}
			});
			<?php
			


		if($Configuracion['Debug'] == 1)	
		{
			?>
			$('form#pedidoFinal input, form#pedidoFinal textarea').each(

				function(index){  
						var input = $(this);
						if(input.attr('type') == "email") input.val('email@pruebas.cl');

						else input.val('Testing '+input.attr('name'));
				}
			);
				<?php

		}
		?>
	});
	function seleccionMetodoPago(idMetodoPago)
	{
		
		
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/Pedido/SeleccionMetodoPago.php?idMetodoPago='+idMetodoPago,
	            success: function(response){
	            	$("<div id='cargador_php_form'></div>").insertBefore( ".total_checkout");
	                document.getElementById('cargador_php_form').innerHTML = response;  
	            }
	        });
		
	}
	var estadoEnvio = 0;
	var form=$("#EvidenciaPago");
	$('form#EvidenciaPago').submit(function(){
		var formData = new FormData(form[0]);
		if($("form#EvidenciaPago")[0].checkValidity()) 
		{ //Validacion HTML5
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/Pedido/SeleccionMetodoPago.php?idMetodoPago=4',
	            processData: false,
				contentType: false,
	            data:formData,
	            success: function(response){
	                document.getElementById('EvidenciaPago').innerHTML = response;
	                estadoEnvio = 1;  
	            }
	        });
			return false;
		}
	});
	$("#idMetodoPago4").on('hidden.bs.modal', function () {
		if(estadoEnvio==1) window.location.href = ruta;
    });
</script>