<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  align="center" class="modal-title" id="exampleModalLabel">Editar Documento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <input type="hidden" id="actualizar-documento_id">
            <div class="col-md-6">
                <label id="actualizar-nombre"></label>
            </div>
            <div class="col-md-6">
                <label id="actualizar-estado"></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
                <label id="actualizar-ubicacion"></label>
            </div>
            <div class="col-md-6">
                <label id="actualizar-fecha"></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-lg-12">
              <textarea type="text" style="width: 100%" rows="3" name="comments" id="actualizar-comentarios"
                placeholder="Comentarios"></textarea>
            </div>
              
          </div>
          
    
        </div>
        <div class="modal-footer">
            <div class="form-row">
                <div class="col-md-6">
                    <button onclick="actualizarDocumento(2)" class="btn btn-danger btn-block">Rechazar</button>
                </div>
                <div class="col-md-6">
                    <button onclick="actualizarDocumento(1)" class="btn btn-success btn-block">Aprobar</button>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>