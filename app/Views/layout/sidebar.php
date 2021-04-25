
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-success">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>/index3.html" class="brand-link navbar-success">
        <img src="<?= base_url() ?>/public/dist/img/mk.svg" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-light">Control exportacion</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>/public/dist/img/profile/<?= session("image") ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= session('first_name')." ".session('last_name');  ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item ">
              <a href="<?= base_url() ?>/inicio" class="nav-link <?= (uri_string() == "inicio") ? "active" : "" ?>">
              <i class="fas fa-home"></i> <p>Inicio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>/usuario/index" class="nav-link <?= (uri_string() == "usuario" || uri_string() == "usuario/index"  || uri_string() == "usuario/create" ) ? "active" : "" ?>">              
                <i class="fas fa-user-alt"></i> <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>/productos" class="nav-link <?= (uri_string() == "productos" || uri_string() == "productos/crear"  || uri_string() == "productos/editar" ) ? "active" : "" ?>">              
              <i class="fas fa-box"></i>  <p>Productos</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
