<?= view('layout/header');?>
<?= view('layout/nav');?>
<?= view('layout/sidebar');?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>/inicio">Inicio</a></li>                
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $compra->id ?></h3>

                <p>Compras</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url()?>/compras" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $producto->id ?></h3>

                <p>Productos</p>
              </div>
              <div class="icon">
              <i class="fas fa-box"></i> 
              </div>
              <a href="<?= base_url()?>/productos" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $usuario->user_id ?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url()?>/usuario/index" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $proveedor->id ?></h3>

                <p>Proveedores</p>
              </div>
              <div class="icon">
              <i class="fas fa-hand-holding-medical"></i>
              </div>
              <a href="<?= base_url()?>/proveedores" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->      
        </div>      
      </section>     
    </div>
    <?= view('layout/footer');?>
