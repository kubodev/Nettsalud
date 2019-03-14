<script type="text/javascript">
	

	var form=$("#FormGiftcard");
	$('form#FormGiftcard').submit(function(){
		var formData = new FormData(form[0]);
		if($("form#FormGiftcard")[0].checkValidity()) 
		{ //Validacion HTML5
			$.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>panelAdmin/inc/modulos/js/loads/Pedido/ComprarGiftcard.php',
	            processData: false,
				contentType: false,
	            data:formData,
	            success: function(response){
	                document.getElementById('FormGiftcard').innerHTML = response;
	              
	            }
	        });
			return false;
		}
	});
</script>