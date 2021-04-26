
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->        
        <li class="nav-item dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url() ?>/public/dist/img/profile/<?= session("image") ?>" class="user-image img-circle elevation-2 alt="User Image">
            <span class="hidden-xs"> <?= session('user') ?> </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">  
            <li class="user-header bg-light">
              <img src="<?= base_url() ?>/public/dist/img/profile/<?= session("image") ?>" class="img-circle elevation-2" alt="User Image">      
              <p> <?= session('first_name')." ".session('last_name');  ?>
                <small> <?= session('created_at') ?></small>
              </p>
            </li>        
            <li class="user-body">
              <div class="row">
                <div class="col-6 text-center">                  
                </div>
                <div class="col-6 text-center">
                  <a href="<?= base_url() ?>/login/logout">Cerrar sesion</a>
                </div>                
              </div>
              <!-- /.row -->
            </li>                   
          </ul>
        </li>       
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
