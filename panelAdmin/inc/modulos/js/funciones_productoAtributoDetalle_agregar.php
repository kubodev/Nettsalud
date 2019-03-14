<script type="text/javascript">
var form=$("#formProductos");
$("<div id='cargador_php_form'></div>" ).insertBefore( $(form) );
 form.submit(function(){
 	var formData = new FormData(form[0]);
	if($(form)[0].checkValidity())
	{
		cargadorOn();
		 $.ajax({
	            type:"POST",
	            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Producto/AtributoDetalle_agregar.php',
	            processData: false,
				contentType: false,
	            data:formData,
	            success: function(response){
	                document.getElementById('cargador_php_form').innerHTML = response; 
	                cargadorOff();
	            }
	        });
	
	return false;
	}
});
</script>