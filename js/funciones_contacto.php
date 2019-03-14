<script>
	<?php
	if($debug == 1){ ?>
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
	$("<div id='cargador_php_form'></div>" ).insertBefore( "form#contacto" );
	$('form#contacto').submit(function(){
		if($("form#contacto")[0].checkValidity()) 
		{ //Validacion HTML5
			var nombre = $('form#contacto input[name="nombre"]').val();
			var asunto = $('form#contacto input[name="asunto"]').val();
			var email = $('form#contacto input[name="email"]').val();
			var mensaje = $('form#contacto textarea[name="mensaje"]').val();
			if(nombre.length > 0 && email.length > 0 && mensaje.length > 0){							
				$('#cargador_php_form').load(ruta+'js/loads/enviar_formulario_contacto.php', {nombre: nombre,email: email,mensaje: mensaje, asunto: asunto });
			} else alert("Debe poner al menos telefono y e-mail");
			return false;
		}
	});
</script>
