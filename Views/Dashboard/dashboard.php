<?php
headeradmin($data);
?>

<?php dep($_SESSION['userdata']);
dep($_SESSION['permisos']);
dep($_SESSION['permisosmod']);
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-4 mb-4">
      <div class="card text-white bg-primary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <p class="card-text">Text</p>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card text-white bg-primary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <p class="card-text">Text</p>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card text-white bg-primary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <p class="card-text">Text</p>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card text-white bg-primary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <p class="card-text">Text</p>
        </div>
      </div>
    </div>
    <div class="col-4 mb-4">
      <div class="card text-white bg-primary">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">Title</h4>
          <p class="card-text">Text</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-12">
      <div class="col-4 mb-4">
        <div class="card text-white bg-primary">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
          <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Text</p>
          </div>
        </div>
      </div>
      <div class="tile">
        <div class="tile-body">Dashboard</div>
      </div>
    </div> -->
  </div>
</main>

<?php
footeradmin($data);
?>