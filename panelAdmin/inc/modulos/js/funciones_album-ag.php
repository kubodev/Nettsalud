<script type="text/javascript">
var form=$("#album-ag");
$("<div id='cargador_php_form'></div>" ).insertBefore( $(form) );
$('#album-ag button[type="submit"]').click(function(){
	 $.ajax({
            type:"POST",
            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Galerias/Album_agregar.php',
            data:form.serialize(),//only input
            success: function(response){
                document.getElementById('cargador_php_form').innerHTML = response;  
            }
        });
	return false;
});


</script>