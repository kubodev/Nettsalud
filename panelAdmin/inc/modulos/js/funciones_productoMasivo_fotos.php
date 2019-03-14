<script type="text/javascript">

var form=$("#formProductos");
var DivResp = $("<div id='cargador_php_form'></div>" ).insertBefore( $(form) );
 form.submit(function(){
 	//var formData = new FormData(form[0]);
 
	/*	if($(form)[0].checkValidity())
		{
			cargadorOn();
			 $.ajax({
		            type:"POST",
		            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Producto/Masivo_fotos.php',
		            processData: false,
					contentType: false,
		            data:formData,
		            success: function(response){
		                document.getElementById('cargador_php_form').innerHTML = response; 
		                cargadorOff();
		            },
		            error: function(xhr, textStatus, error){
					      alert("Ocurrió un error, intente recargando la página y subir menos fotos")
					  }
		        });
		
			
		}*/
		var files = $('#fotos')[0].files;
		var contador = 1;
	    var totalFiles = files.length
	    $('.contador').fadeIn("slower");
	     $('.contador #b').html(totalFiles);
	    for(var i=0; i < totalFiles; i++)

	    {
	    	var formData = new FormData();
	        formData.append("fotos",files[i]);
	        //var formData = new FormData(files[i]);
	       	 $.ajax({
		            type:"POST",
		            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Producto/Masivo_fotos.php',
		            processData: false,
					contentType: false,
		            data:formData,
		            success: function(response){
		                $('<p>'+response+'</p>').insertBefore($(DivResp)); 
		                cargadorOff();
		                 $('.contador #a').html(contador);
				       	 $('.contador #b').html(totalFiles);
				       	 contador++;
				       	 if(contador == totalFiles)
				       	 {
				       	 	alert("Se terminó de procesar toda la cola");
				       	 }
		            }
		        });

	    } 
	return false;
	});

</script>