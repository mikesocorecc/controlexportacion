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
                <li class="breadcrumb-item"><a href="<?= base_url()?>/usuario">Inicio</a></li>
                <li class="breadcrumb-item active"><?= $titulo ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">               
            <form action="<?= base_url() ?>/usuario/store" method="post" enctype="multipart/form-data">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title"><?= $titulo ?></h3>    
                  <a href="<?= base_url() ?>/usuario" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                </div>
                <!-- /.card-header -->
                <?php $validation = \Config\Services::validation(); ?>
                <div class="card-body">                
                <div class="row">
                <div class="form-group col-4">
                    <label for="first_name">Nombre:</label>
                    <input type="text" class="form-control <?= ($validation->getError('first_name')) ? "is-invalid" : "" ?>" id="first_name" name="first_name" placeholder="Nombre" value="">
                     <!-- Error -->
                    <?= ($validation->getError('first_name')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('first_name')."</span>" : ""; ?>
                </div>
                <div class="form-group col-4">
                    <label for="last_name">Apellido:</label>
                    <input type="text" class="form-control <?= ($validation->getError('last_name')) ? "is-invalid" : "" ?>" id="last_name" name="last_name" placeholder="Apellido" value="">
                    <!-- Error -->
                    <?= ($validation->getError('last_name')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('last_name')."</span>" : ""; ?>
                </div>
                <div class="form-group col-4">
                    <label for="email">Correo:</label>
                    <input type="email" class="form-control <?= ($validation->getError('email')) ? "is-invalid" : "" ?>" id="email" name="email" placeholder="Correo" value="">
                     <!-- Error -->
                     <?= ($validation->getError('email')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('email')."</span>" : ""; ?>
                  </div>
                <div class="form-group col-4">
                    <label for="tipousuario">Tipo usuario:</label>                   
                    <select class="form-control <?= ($validation->getError('tipousuario')) ? "is-invalid" : "" ?>" name="tipousuario" id="tipousuario">
                         <option value="" selected disabled>---SELECCIONE--- </option>
                         <option value="administrador">Administrador</option>
                         <option value="empleado">Empleado</option>
                     </select> 
                       <!-- Error -->
                       <?= ($validation->getError('tipousuario')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('tipousuario')."</span>" : ""; ?>     
                  </div>           
                <div class="form-group col-4">
                    <label for="user">Usuario:</label>
                    <input type="text" class="form-control <?= ($validation->getError('user')) ? "is-invalid" : "" ?>" id="user" name="user" placeholder="Usuario" value="">
                     <!-- Error -->
                     <?= ($validation->getError('user')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('user')."</span>" : ""; ?>
                  </div>
                <div class="form-group col-4">
                    <label for="password">Contrase??a</label>
                    <input type="password" class="form-control <?= ($validation->getError('password')) ? "is-invalid" : "" ?>" id="password" name="password" placeholder="Contrase??a" value="">
                     <!-- Error -->
                     <?= ($validation->getError('password')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('password')."</span>" : ""; ?>
                  </div>                  
                  <div class="form-group col-4">              
                  <label for="image">Foto de perfil</label>    
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="customFile">Seleccione archivo</label>
                    </div>
                  </div>                               
                </div>
              </div>   
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Registrar</button>
              </div> 
              </form>     
              </div>         
            </div>           
          </div>                   
      </section>     
      <!-- Main content -->
    </div>
    <!-- CONTENT WRAPER -->

    <?= view('layout/footer');?>
