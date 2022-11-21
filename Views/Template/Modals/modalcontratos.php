<!-- Modal -->
<div class="modal fade" id="modalformcontratos" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerregister"> 
        <h5 class="modal-title" id="titlemodal">Subir Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
              <form autocomplete="off" class="form-horizontal" id="formcontratos" name="formcontratos" enctype="multipart/form-data" >
              <input id="idcontrato" name="idcontrato" type="hidden" value="">
                <p class="text-primary">Todos los campos son obligatorios.</p>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" id="txtnombre" name="txtnombre" type="text" minlength="2" maxlength="50" pattern="[a-zA-Z]{2,20}" placeholder="Nombre del Archivo" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Descripcion</label>
                    <input class="form-control" id="txtdescripcion" name="txtdescripcion" type="text" minlength="2" maxlength="150" placeholder="Descripcion del producto" required="">
                  </div>
                </div>

                
                <div class="form-row">
                    <div class="form-group mb-3 col-md-6">
                      <label class="control-label">Seleccionar Archivo</label>
                      <input type="file" class="form-control" id="txtarchivo" name="txtarchivo">
                    </div>

                    <div class="form-group col-md-6">
                      <label class="control-label">Fecha</label>
                      <input type="date" class="form-control" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                </div>

                <div class="tile-footer">
                    <button id="btnactionform" class="btn btn-primary" type="submit">
                      <i class="fa fa-fw fa-lg fa-check-circle"></i>
                      <span id="btntext">Guardar</span>
                    </button>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="#" data-dismiss="modal">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            
      </div>
      
    </div>
  </div>
</div>