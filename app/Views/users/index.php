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
              <h1>Usuarios</h1>         
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>/usuario/index">Inicio</a></li>
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
                  <a href="<?= base_url() ?>/usuario/create" class="btn bg-gradient-info float-right"><i class="fas fa-plus"> </i> Nuevo</a>                            
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Usuario</th>                                           
                        <th>Estado</th>
                        <th>Miembro desde</th>
                        <!-- <th>Acciones</th> -->
                      </tr>
                    </thead>
                    <tbody> 
                        <?php foreach ($datos as $usuario ) {?>                   
                      <tr>
                          <td><?= $usuario->user_id ?></td>
                          <td><?= $usuario->first_name." ".$usuario->last_name ?></td>
                          <td><?= $usuario->email ?></td>
                          <td><?= $usuario->user ?></td>                          
                          <td><span class="float-right badge bg-<?= ($usuario->status == 1) ? "success" : "danger" ?>"><?= ($usuario->status == 1) ? "ACTIVO" : "INACTIVO" ?></span></td>                               
                          <td><?= date("d/m/Y", strtotime($usuario->created_at)) ?></td>
                          <!-- <td>
                              <a href="<?= base_url()?>/usuario/editar/<?= $usuario->user_id  ?>" class="btn  bg-gradient-info btn-sm">Editar</a>
                              <a  class="btn  bg-gradient-danger btn-sm" id="borrar" data-base_url="<?= base_url(); ?>" data-registro="<?= $usuario->user_id ?>">Borrar</a>
                          </td>
                      </tr> -->
                        <?php } ?>
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
