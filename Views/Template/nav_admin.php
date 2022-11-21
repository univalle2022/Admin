<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://us.123rf.com/450wm/koblizeek/koblizeek2001/koblizeek200100050/138262629-usuario-miembro-de-perfil-de-icono-de-hombre-vector-de-s%C3%ADmbolo-perconal-sobre-fondo-blanco-aislado-.jpg?ver=6" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userdata']['Nombre'] ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userdata']['Tipo'] ?></p>
        </div>
      </div>
      
      <ul class="app-menu">

        <?php if(!empty($_SESSION['permisos'][1]['r']) ){?>
        <li>
          <a class="app-menu__item" href="<?= base_url()?>/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span>
          </a>
        </li>
        <?php } ?>
        
        <?php if(!empty($_SESSION['permisos'][2]['r']) || !empty($_SESSION['permisos'][6]['r']) ){?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <?php if(!empty($_SESSION['permisos'][2]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
            <?php } ?>

            <?php if(!empty($_SESSION['permisos'][6]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <?php } ?>
            <!--<li><a class="treeview-item" href="<?= base_url()?>/permisos"><i class="icon fa fa-circle-o"></i> Permisos</a></li>-->
          </ul>
        </li>
        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][3]['r'])){?>
        <li>
          <a class="app-menu__item" href="<?= base_url()?>/clientes">
          <i class="app-menu__icon fa fa-file-code-o"></i>
          <span class="app-menu__label">Clientes</span>
          </a>
        </li>

        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][7]['r'])){?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Productos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <?php if(!empty($_SESSION['permisos'][7]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/categorias"><i class="icon fa fa-circle-o"></i> Categorias</a></li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][4]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/productos"><i class="icon fa fa-circle-o"></i> Productos</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if(!empty($_SESSION['permisos'][8]['r']) || !empty($_SESSION['permisos'][9]['r']) || !empty($_SESSION['permisos'][10]['r'])){?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Inventario</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <?php if(!empty($_SESSION['permisos'][8]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/proveedores"><i class="icon fa fa-circle-o"></i> Proveedores</a></li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][9]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/materiales"><i class="icon fa fa-circle-o"></i> Materiales</a></li>
            <?php } ?>
            <?php if(!empty($_SESSION['permisos'][10]['r'])) { ?>
            <li><a class="treeview-item" href="<?= base_url()?>/compras"><i class="icon fa fa-circle-o"></i> Compras</a></li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <li>
          <a class="app-menu__item" href="<?= base_url()?>/pedidos">
          <i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Pedidos</span>
          </a>
        </li>

        <li>
          <a class="app-menu__item" href="<?= base_url()?>">
          <i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Logout</span>
          </a>
        </li>
      </ul>
    </aside>