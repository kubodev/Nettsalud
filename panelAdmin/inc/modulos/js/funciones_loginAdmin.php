<script type="text/javascript">

	$("<div id='cargador_php_login'></div>").insertBefore( "form#loginAdmin");

	<?php
	if($Configuracion['Debug'] == 1){
		$sql = mysql_query("SELECT * FROM UsuariosAdmin LIMIT 1");
		$col = mysql_fetch_array($sql);
	?>
	$('form#loginAdmin input[name="Usuario"]').val("<?php echo $col['Usuario'] ?>");
	<?php } ?>

	$('form#loginAdmin').submit(function(){
		var usuario = $('form#loginAdmin input[name="Usuario"]').val();	
		var contrasena = $('form#loginAdmin input[name="Contrasena"]').val();		
		cargadorOn();
		$('#cargador_php_login').load('<?php echo $ruta ?>inc/modulos/js/loads/loginAdmin.php', {Usuario: usuario, Contrasena: contrasena },function(){cargadorOff();});	
		return false;
	});
</script>