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
      <!-- /.content-header-->

      <!-- Main content -->
      <section class="content">
               <div class="container-fluid">
                  <div class="row">
                        <div class="col-12">               
                        <form action="<?= base_url() ?>/productos/update/<?= $datos->id ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $datos->id ?>">
                              <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/productos" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                    <div class="row"> 
                                    <input type="hidden" name="id" value="<?= $datos->id ?>">
                                    <div class="form-group col-4">
                                      <label for="producto">Producto:</label>
                                      <input type="text" class="form-control <?= ($validation->getError('producto')) ? "is-invalid" : "" ?>" id="producto" name="producto" placeholder="Producto" value="<?= $datos->producto  ?>">
                                      <!-- Error -->
                                      <?= ($validation->getError('producto')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('producto')."</span>" : ""; ?>
                                  </div>
                                  <div class="form-group col-4">
                                      <label for="sku">SKU:</label>
                                      <input type="text" class="form-control <?= ($validation->getError('sku')) ? "is-invalid" : "" ?>" id="sku" name="sku" placeholder="SKU" value="<?= $datos->sku  ?>">
                                      <!-- Error -->
                                      <?= ($validation->getError('sku')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('sku')."</span>" : ""; ?>
                                  </div>
                                  <div class="form-group col-4">
                                      <label for="presentacion">Presentacion:</label>
                                      <input type="text" class="form-control <?= ($validation->getError('presentacion')) ? "is-invalid" : "" ?>" id="presentacion" name="presentacion" placeholder="Presentacion" value="<?= $datos->presentacion  ?>">
                                      <!-- Error -->
                                      <?= ($validation->getError('presentacion')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('presentacion')."</span>" : ""; ?>
                                    </div>
                                  <div class="form-group col-4">
                                      <label for="volumen">Volumen:</label>
                                      <input type="text" class="form-control <?= ($validation->getError('volumen')) ? "is-invalid" : "" ?>" id="volumen" name="volumen" placeholder="Volumen" value="<?= $datos->volumen  ?>">
                                      <!-- Error -->
                                      <?= ($validation->getError('volumen')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('volumen')."</span>" : ""; ?>
                                    </div>
                                    <div class="form-group col-4">
                                          <label for="unidades">Unidades por caja:</label>
                                          <input type="text" class="form-control <?= ($validation->getError('unidades')) ? "is-invalid" : "" ?>" id="unidades" name="unidades" placeholder="Unidades por caja" value="<?= $datos->unidades  ?>">
                                          <!-- Error -->
                                          <?= ($validation->getError('unidades')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('unidades')."</span>" : ""; ?>
                                      </div>  
                                    <div class="form-group col-4">              
                                    <label for="fotografia">Fotografia Producto</label>    
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->getError('fotografia') ) ? "is-invalid" : "" ?>" id="fotografia" name="fotografia">
                                        <!-- Error -->
                                      <?= ($validation->getError('fotografia')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('fotografia')."</span>" : ""; ?>
                                        <label class="custom-file-label" for="customFile">Seleccione archivo</label>
                                      </div>
                                    </div>  
                                      <div class="form-group col-4">
                                          <label for="fotografia">Imagen actual</label>    <br>
                                              <img src="<?= base_url() ?>/public/dist/img/productos/<?= $datos->fotografia ?>"  alt="Fotografia " style="width: 60px;">
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
