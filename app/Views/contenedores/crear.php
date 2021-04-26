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
              <h1>Contenedores</h1>              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>/contenedores">Inicio</a></li>
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
                  <form action="<?= base_url() ?>/contenedores/store" method="post" >
                          <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/contenedores" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                      <div class="row">
                                            <div class="form-group col-4">
                                                <label for="identificacion"># Identificacion:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('identificacion')) ? "is-invalid" : "" ?>" id="identificacion" name="identificacion" placeholder="Numero de identificacion" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('identificacion')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('identificacion')."</span>" : ""; ?>
                                            </div>                                         
                                            <div class="form-group col-4">
                                                <label for="producto">Producto:</label>
                                                <select class="form-control <?= ($validation->getError('producto')) ? "is-invalid" : "" ?>" name="producto" id="producto">
                                                  <option value="" selected disabled>---SELECCIONE PRODUCTO--- </option>
                                                  <?php foreach ($productos as $producto) { ?>
                                                    <option value="<?= $producto->id ?>" ><?= $producto->producto ?></option>							
                                                  <?php } ?>
                                                </select> 
                                                 <!-- Error -->
                                                 <?= ($validation->getError('producto')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('producto')."</span>" : ""; ?>     
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="cantidad">Cantidad:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('cantidad')) ? "is-invalid" : "" ?>" id="cantidad" name="cantidad" placeholder="cantidad" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('cantidad')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('cantidad')."</span>" : ""; ?>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="fechaArribo">Fecha arribo:</label>
                                                <input type="date" class="form-control <?= ($validation->getError('fechaArribo')) ? "is-invalid" : "" ?>" id="fechaArribo" name="fechaArribo" placeholder="Fecha arribo" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('fechaArribo')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('fechaArribo')."</span>" : ""; ?>
                                              </div>
                                            <div class="form-group col-4">
                                                <label for="lugarArribo">Lugar arribo:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('lugarArribo')) ? "is-invalid" : "" ?>" id="lugarArribo" name="lugarArribo" placeholder="Lugar arribo" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('lugarArribo')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('lugarArribo')."</span>" : ""; ?>
                                              </div>
                                            <div class="form-group col-4">
                                                <label for="aeropuertodestino">Aeropuerto destino:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('aeropuertodestino')) ? "is-invalid" : "" ?>" id="aeropuertodestino" name="aeropuertodestino" placeholder="Aeropuerto destino" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('aeropuertodestino')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('aeropuertodestino')."</span>" : ""; ?>
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
