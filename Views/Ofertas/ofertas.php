<?php 
  headeradmin($data);
  getmodal('modalofertas',$data);
?>
   
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title']?>
            <button class="btn btn-primary btn-sm" type="button" onclick="openmodal()" style="margin-left: 20px;" >Nuevo</button>
          </h1>
      
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#"> <?= $data['page_title']?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Ofertas</div>
            
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableofertas">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>IdProducto</th>
                      <th>Porcentaje</th>
                      <th>Fecha Inicio</th>
                      <th>Fecha Final</th>
                      <th>Estatus</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>

<?php 
  footeradmin($data);
?>
   