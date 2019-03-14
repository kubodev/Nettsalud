<script>

	$(function(){
        $("input[name='fotos[]']").on("change", function(){
			$('#divFotos').css('opacity','0.3');
			$('#cargando').fadeIn("slower");
            var formData = new FormData($("#formFotos")[0]);
            var ruta2 = ruta+"/inc/modulos/js/loads/Producto/SubirImagenesPublicacion.php";
            $.ajax({
                url: ruta2,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#divFotos").html(datos);
					$('#divFotos').css('opacity','1');
					$('#cargando').fadeOut("slower");
                }
            });
        });
     });
	function elimFoto(elim)
	 {
		 $('#'+elim).fadeOut("slower");
		 $('#cargador_php_form').load(ruta+'inc/modulos/js/loads/Producto/elimFotoPublicacion.php', {img:elim });
	 }
	$('.descuentos input').change(function() {
        if($(this).is(":checked")) 
        {
            $('#boxDescuento').fadeIn("slower");
            $('#Precio').fadeOut("slower");
        }
       	else 
       	{
       		$('#boxDescuento').fadeOut("slower");
            $('#Precio').fadeIn("slower");
       	}    
    });

	var form=$("#formProductos");

	$("<div id='cargador_php_form'></div>" ).insertBefore( $(form) );

	 form.submit(function(){

	 	
	 	if($(form)[0].checkValidity())

		{

			cargadorOn();
			<?php 
			if($Configuracion['SistemaModelos'] == 1) 
			{
				?>
				recopilarModelos();				
				setTimeout(function(){enviarFormulario()},1000);
				<?php 
			} 
			else
			{
				?>
				enviarFormulario();
				<?php
			}
			?>
		
			return false;

		}

	});
	function enviarFormulario()
	{
		var formData = new FormData(form[0]);
					 $.ajax({

				            type:"POST",

				            url:'<?php echo $ruta; ?>inc/modulos/js/loads/Producto/Producto_agregar.php',

				            processData: false,

							contentType: false,

				            data:formData,

				            success: function(response){

				                document.getElementById('cargador_php_form').innerHTML = response; 

				                cargadorOff();

				                $(window).scrollTop($('header').offset().top);

				            }

				        });
	}
	<?php	
	if($Configuracion['SistemaModelos'] == 1)
	{
		?>
		var ultimaEspecificacion = [1];
		var ultimoModelo = 0;
		var permiteEnvioFormulario = 1;
		function agregarModelo(id)
		{
			ultimaEspecificacion.push("1");
			$('<div class="modelo" style="display:none" modelo="'+id+'" id="modelo'+id+'"></div>').insertBefore("#posicionModelos",function(){});			
			$('#modelo'+id).load(ruta+'inc/modulos/js/loads/Producto/generarModelo.php', {idModelo: id});
			$('#modelo'+id).fadeIn("slower");
			ultimoModelo++;
			$('input[name="ultimoModelo"]').val(ultimoModelo);
		}
		agregarModelo(1); // Carga el primer slot de modelo por defecto
		function anadirEspecificacion(modelo)
		{
			var maximoEspecificaciones = <?php				
			$sql = mysql_query("SELECT * FROM ProductoAtributo");				
			echo mysql_num_rows($sql);				
			?>;				
			if(maximoEspecificaciones > ultimaEspecificacion[modelo])				
			{					
				var aleatorio = Math.floor(Math.random() * 90 + 10);										
				var nuevaespecif = '<div class="especificacion" id="especi'+aleatorio+'"></div>';										
				$(nuevaespecif).insertBefore('#modelo'+modelo+' #otra-especif');																				
				var detallePrevio = $("#modelo"+modelo+" .especificacion select[name='detalle"+ultimaEspecificacion[modelo]+"'] option:selected").val();
				$("#modelo"+modelo+" #especificacion"+ultimaEspecificacion[modelo]).val(detallePrevio);
				var especificacion1 = $("#modelo"+modelo+" #especificacion1").val();						
				var especificacion2 = $("#modelo"+modelo+" #especificacion2").val();						
				var especificacion3 = $("#modelo"+modelo+" #especificacion3").val();						
				var especificacion4 = $("#modelo"+modelo+" #especificacion4").val();											
				setTimeout(function(){$('#modelo'+modelo+' #especi'+aleatorio).load(ruta+'inc/modulos/js/loads/Producto/generaEspecificacion.php', {ultimaEspecificacion: ultimaEspecificacion[modelo], especificacion1:especificacion1, especificacion2:especificacion2, especificacion3:especificacion3, especificacion4:especificacion4});},400);												
				$("#modelo"+modelo+" .especificacion select[name='detalle"+ultimaEspecificacion[modelo]+"']").attr('disabled','disabled');
				ultimaEspecificacion[modelo]++;		
				if(maximoEspecificaciones == ultimaEspecificacion[modelo])
				{
					$('#modelo'+modelo+' #otra-especif span').fadeOut(500);
				}
			} else alert("No hay más especificaciones disponibles");				
			return false;							
		}
		function guardarModelo(id)
		{
			var nuevaespecif = '<div class="especificacion"><div class="lineaform"><label>SKU:</label><input placeholder="Ej: AAA123" name="sku'+id+'"></div><div class="lineaform"><label>Stock:</label><input placeholder="Ej: 10" name="stock'+id+'"></div><div class="lineaform"><label>Precio:</label><input placeholder="12990" name="precio'+id+'"></div></div>';	
			$("#modelo"+id+" #otra-especif").html(nuevaespecif);
			$("#modelo"+id+" .especificacion select[name='detalle"+ultimaEspecificacion[id]+"']").attr('disabled','disabled');
		}
		function borrarModelo(idModelo)
		{
			$('#modelo'+idModelo).fadeOut("slower",function(){$('#modelo'+idModelo).remove()});	
		}
		function verificarEnvio()
		{
			if(permiteEnvioFormulario == 1) {} else return false;
		}
		$("#editar-espesifi").change(function(){
			$("#nuevaespesi").val($("#editar-espesifi option:selected").text());
		});
		function recopilarModelos()
		{
						var JsonModelos = '{"Modelo": [';
						var modelos = $('#modelosseleccionados');
						var aux = 0;
						var x;
						var i;
						var l;
						var aux2 = [];
						for(x=0;x<modelos[0].children.length-1;x++){
							for(i=0;i<=modelos[0].children[x].children.length-1;i++){
								if(typeof(modelos[0].children[x].children[i]) != 'className'){
									if(modelos[0].children[x].children[i].className == "especificacion"){
										if(modelos[0].children[x].children[i].children[0].value != undefined){
											if(aux2.indexOf(x) == "-1"){
												aux2.push(x);
												JsonModelos += '{"espesificaciones": [';
											}
											JsonModelos += '{"valor": "'+modelos[0].children[x].children[i].children[0].value+'"},';
										}								
									}
									if(modelos[0].children[x].children[i].id == "otra-especif"){
										for(l=0;l<=modelos[0].children[x].children[i].children[0].children.length-1;l++){
											if(l==0){
												JsonModelos = JsonModelos.substring(0, JsonModelos.length-1);
												JsonModelos += '],"sku": "'+modelos[0].children[x].children[i].children[0].children[l].children[1].value+'",';
											}else if(l==1){
												JsonModelos = JsonModelos.substring(0, JsonModelos.length-1);
												JsonModelos += ',"stock": "'+modelos[0].children[x].children[i].children[0].children[l].children[1].value+'",';
											}
											else if(l==2){
												JsonModelos += '"valor": "'+modelos[0].children[x].children[i].children[0].children[l].children[1].value+'"},';												
											}
											
										}
									}
								}
							}
						}
						JsonModelos = JsonModelos.substring(0, JsonModelos.length-1);
						JsonModelos += ']}';
						$('<input type="hidden" name="modelos" id="modelosenviar">').insertBefore( $('#modelosseleccionados') );
						$("#modelosenviar").val(JsonModelos);
						return true;	
		}
		$('span[name="otromodelo"]').click(function(){
			var nuevoModelo = ultimoModelo+1;
			agregarModelo(nuevoModelo);
			return false;
		});					
					
		<?php
	}
	?>

</script>