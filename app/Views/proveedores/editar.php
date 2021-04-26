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
              <h1>Proveedores</h1>              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url()?>/proveedores">Inicio</a></li>
                <li class="breadcrumb-item active"><?= $titulo ?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content-header-->

      <!-- Main content -->
      <section class="content">
               <div class="container-fluid">
                  <div class="row">
                        <div class="col-12">               
                        <form action="<?= base_url() ?>/proveedores/update/<?= $datos->id ?>" method="post" >
                              <input type="hidden" name="id" value="<?= $datos->id ?>">
                              <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/proveedores" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                    <div class="row"> 
                                    <input type="hidden" name="id" value="<?= $datos->id ?>">
                                      <div class="form-group col-4">
                                          <label for="proveedor">Proveedor:</label>
                                          <input type="text" class="form-control <?= ($validation->getError('proveedor')) ? "is-invalid" : "" ?>" id="proveedor" name="proveedor" placeholder="Proveedor" value="<?= $datos->proveedor ?>">
                                          <!-- Error -->
                                          <?= ($validation->getError('proveedor')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('proveedor')."</span>" : ""; ?>
                                      </div>
                                      <div class="form-group col-4">
                                          <label for="direccion">Direccion:</label>
                                          <input type="text" class="form-control <?= ($validation->getError('direccion')) ? "is-invalid" : "" ?>" id="direccion" name="direccion" placeholder="Direccion" value="<?= $datos->direccion ?>">
                                          <!-- Error -->
                                          <?= ($validation->getError('direccion')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('direccion')."</span>" : ""; ?>
                                      </div>
                                      <div class="form-group col-4">
                                          <label for="telefono">Telefono:</label>
                                          <input type="text" class="form-control <?= ($validation->getError('telefono')) ? "is-invalid" : "" ?>" id="telefono" name="telefono" placeholder="Telefono" value="<?= $datos->telefono ?>">
                                          <!-- Error -->
                                          <?= ($validation->getError('telefono')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('telefono')."</span>" : ""; ?>
                                        </div>
                                      <div class="form-group col-4">
                                          <label for="telefonoContacto">Tel Contacto:</label>
                                          <input type="text" class="form-control <?= ($validation->getError('telefonoContacto')) ? "is-invalid" : "" ?>" id="telefonoContacto" name="telefonoContacto" placeholder="Telefono Contacto" value="<?= $datos->telefonoContacto ?>">
                                          <!-- Error -->
                                          <?= ($validation->getError('telefonoContacto')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('telefonoContacto')."</span>" : ""; ?>
                                        </div>                    
                                    </div>
                                  </div>   
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div> 
                              </div>
                        </form>     
                        </div>         
                  </div>           
              </div>                  
      </section>     
      <!-- Main content -->
    </div>
<!-- Content Wrapper. Contains page content -->
    <?= view('layout/footer');?>
