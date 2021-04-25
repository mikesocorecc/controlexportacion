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
              <h1>Productos</h1>         
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>/productos">Inicio</a></li>
                <li class="breadcrumb-item active"><?= $titulo ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- /.container-fluid -->
      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">               
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title"><?= $titulo ?></h3>    
                  <a href="<?= base_url() ?>/productos/crear" class="btn bg-gradient-info float-right"><i class="fas fa-plus"> </i> Nuevo</a>                            
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>sku</th>
                        <th>presentacion</th>                                           
                        <th>volumen</th>
                        <th>fotografia</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody> 
                        <?php  foreach ($datos as $registro ) {?>                   
                      <tr>
                          <td><?= $registro->id  ?></td>
                          <td><?= $registro->producto ?></td>
                          <td><?= $registro->sku ?></td>
                          <td><?= $registro->presentacion ?></td>                          
                          <td><?= $registro->volumen ?></td>                                                                      
                          <td> <img src="<?= base_url() ?>/public/dist/img/productos/<?= $registro->fotografia ?>"  alt="Fotografia " style="width: 50px;"></td>                          
                          <td><?= date("d/m/Y", strtotime($registro->created_at)) ?></td>                                                                        
                          <td>
                              <a href="<?= base_url()?>/usuario/editar/<?= $registro->id  ?>" class="btn  bg-gradient-info btn-sm">Editar</a>
                              <a  class="btn  bg-gradient-danger btn-sm text-light" id="borrar" data-base_url="<?= base_url(); ?>" data-registro="<?= $registro->id ?>">Borrar</a>
                          </td>
                      </tr>
                        <?php  } ?>
                    </tbody>             
                  </table>
                </div>            
              </div>         
            </div>           
          </div>         
        </div>      
      </section>    
      <!-- Main content --> 
    </div>
<!-- Content Wrapper. Contains page content -->
    <?= view('layout/footer');?>
