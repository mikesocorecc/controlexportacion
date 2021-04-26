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
              <h1>Catalogo precios</h1>              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>/precios">Inicio</a></li>
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
                  <form action="<?= base_url() ?>/precios/store" method="post" >
                          <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/precios" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                      <div class="row">                                            
                                            <div class="form-group col-4">
                                                <label for="productoid">Producto:</label>
                                                <select class="form-control <?= ($validation->getError('productoid')) ? "is-invalid" : "" ?>" name="productoid" id="productoid">
                                                  <option value="" selected disabled>---SELECCIONE PRODUCTO--- </option>
                                                  <?php foreach ($productos as $producto) { ?>
                                                    <option value="<?= $producto->id ?>" ><?= $producto->producto ?></option>							
                                                  <?php } ?>
                                                </select> 
                                                 <!-- Error -->
                                                 <?= ($validation->getError('productoid')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('productoid')."</span>" : ""; ?>     
                                            </div>

                                            <div class="form-group col-4">
                                                <label for="proveedorid">Proveedor:</label>
                                                <select class="form-control <?= ($validation->getError('proveedorid')) ? "is-invalid" : "" ?>" name="proveedorid" id="proveedorid">
                                                <option value="" selected disabled>---SELECCIONE PROVEEDOR--- </option>
                                                  <?php foreach ($proveedores as $proveedor) { ?>
                                                    <option value="<?= $proveedor->id ?>" ><?= $proveedor->proveedor ?></option>							
                                                  <?php } ?>
                                                </select> 
                                                 <!-- Error -->
                                                 <?= ($validation->getError('proveedorid')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('proveedorid')."</span>" : ""; ?>     
                                            </div>
                                            
                                            <div class="form-group col-4">
                                                <label for="precio">Precio:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('precio')) ? "is-invalid" : "" ?>" id="precio" name="precio" placeholder="Precio producto" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('precio')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('precio')."</span>" : ""; ?>
                                              </div>                                                                                                                          
                                      </div>
                                </div>   
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div> 
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
