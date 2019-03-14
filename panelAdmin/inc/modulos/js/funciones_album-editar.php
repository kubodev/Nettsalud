<script type="text/javascript">
var form=$("#album-editar");
$("<div id='cargador_php_form'></div>" ).insertBefore( $(form) );
$('#album-editar button[type="submit"]').click(function(){
	 $.ajax({
            type:"POST",
            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Galerias/Album_editar.php',
            data:form.serialize(),//only input
            success: function(response){
                document.getElementById('cargador_php_form').innerHTML = response;  
            }
        });
	return false;
});
$(function(){
		var numImg = 0;
        $("input[name='cargador[]']").on("change", function(){
			if(numImg == 0)
			{
				cargadorOn();
				var formData = new FormData($("#cargarFotos")[0]);
				var ruta2 = ruta+"inc/modulos/js/loads/Galerias/subirFotoAlbum.php";
				$.ajax({
					url: ruta2,
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(datos)
					{
						numImg = 1;
						var aleatorio = Math.floor(Math.random() * 90 + 10);
						var divRespuesta = $('<div id="cargaform'+aleatorio+'"></div>').insertAfter($("ul#listaFotos li.foto").last());
						$(divRespuesta).html(datos);
						cargadorOff();
					}
				});
			} else alert("Solo puedes subir una foto");
        });
     });


</script>