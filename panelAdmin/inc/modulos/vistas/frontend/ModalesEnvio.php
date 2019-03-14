<div class="modal fade" id="idMetodoPago4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de pago</h4>
      </div>
      <div class="modal-body">
          <form id="EvidenciaPago">
            <p>Por favor realice la transferencia/deposito con los siguientes datos:</p>
            <br>
            <?php echo $seccion->obtenerTexto(12); ?>
            <br>
            <label></label>
            <p>Seguido de ello, por favor adjunte el comprobante en el siguiente formulario:</p>
            <br>
            <div class="lineaform">
              <label>Comprobante</label>
              <input type="file" name="img" required>
            </div>
            <br>
            <div class="lineaform">
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>