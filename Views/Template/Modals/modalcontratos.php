  <!-- Modal -->
  <div class="modal fade" id="modalformcontratos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header headerregister">
          <h5 class="modal-title" id="titlemodal">Subir Contrato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form autocomplete="off" class="form-horizontal" id="formcontratos" name="formcontratos" enctype="multipart/form-data">
            <input id="idcontrato" name="idcontrato" type="hidden" value="0">
            <p class="text-primary">Todos los campos son obligatorios.</p>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label class="control-label">Usuario</label>
                <input class="form-control" value="<?php echo($_SESSION['userdata']['Nombre']);?>" id="idusuario" name="idusuario" type="text" required="" readonly>
              </div>
              <div class="form-group mb-3 col-md-6">
                <label class="control-label">Fecha</label>
                <input type="date" class="form-control" id="txtfecha" name="txtfecha" value="<?php echo date("Y-m-d"); ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group mb-3 col-md-6">
                <label class="control-label">Seleccionar Archivo</label>
                <input type="file" class="form-control" id="txtarchivo" name="txtarchivo" accept=".doc,.docx,.pdf">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Descripcion</label>
                <input type="text" class="form-control" id="txtdescripcion" name="txtdescripcion" minlength="2" maxlength="150" pattern="[a-zA-Z]{0,9}" placeholder="Nombre del Archivo">
              </div>
            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="liststatus" name="liststatus" placeholder="Estado">
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Cliente</label>
                <select class="form-control" data-live-search="true" id="idcliente" name="idcliente" placeholder="Seleccione al cliente"></select>
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