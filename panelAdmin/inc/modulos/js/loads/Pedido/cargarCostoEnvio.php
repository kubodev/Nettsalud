<?php
	$dir=explode('inc',dirname(__FILE__));
	$permiteAcceso=1;
	require_once($dir[0]."inc/controlador.php");
	unset($_SESSION['Pedido']['idCostoEnvio']);
	$idMetodoEnvio = $_POST['idMetodoEnvio'];
	$_SESSION['Pedido']['idMetodoEnvio'] = $idMetodoEnvio;
	$tituloModal = NULL;
	$cuerpoModal = NULL;
	if($Carro->totalPedido() < 35000)
	{
		$tituloModal = 'Costo de envío';
		$sql = mysql_query("SELECT * FROM CostoEnvio WHERE idMetodoEnvio = '".$idMetodoEnvio."'");
		if(mysql_num_rows($sql))
		{
			$cuerpoModal = '<p>Seleccione una zona de envío:</p>';
			$cuerpoModal .= '<form><select name="idCostoEnvio" onchange="javascript:seleccionCostoEnvio(this.value)">';
			$cuerpoModal .= '<option>-- Seleccione --</option>';
			while($col = mysql_fetch_array($sql))
			{
				$cuerpoModal .= '<option value="'.$col['idCostoEnvio'].'">'.$col['Zona'].' ('.formatoMoneda($col['Costo']).')</option>';
			}
			$cuerpoModal .= '</select>';
		}
	}
if(strlen($cuerpoModal))
{
	?>
	<div class="modal fade" id="modalCostoEnvio">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><?php echo $tituloModal; ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       	<?php echo $cuerpoModal; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script>
	$('#modalCostoEnvio').modal('show');
	</script>
	<?php
}
?>