<?php 
  headeradmin($data);
 
?>
   
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title']?></h1>
  
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#"><?= $data['page_title']?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Dashboard</div>
             <?php dep( $_SESSION['userdata']);
               dep($_SESSION['permisos']);
               dep($_SESSION['permisosmod']);
               ?>
          </div>
        </div>
      </div>
    </main>

<?php 
  footeradmin($data);
?>
   