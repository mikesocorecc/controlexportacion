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
              <h1>Envios</h1>              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>/envios">Inicio</a></li>
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
                  <form action="<?= base_url() ?>/envios/store" method="post" >
                          <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/envios" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                      <div class="row">
                                            <div class="form-group col-4">
                                                <label for="contenedorid">Contenedor:</label>
                                                <select class="form-control <?= ($validation->getError('contenedorid')) ? "is-invalid" : "" ?>" name="contenedorid" id="preciocontenedorid">
                                                <option value="" selected disabled>---SELECCIONE CONTENEDOR--- </option>
                                                  <?php foreach ($contenedores as $contenedor) { ?>
                                                    <option value="<?= $contenedor->id ?>" ><?= $contenedor->identificacion ?></option>							
                                                  <?php } ?>
                                                </select> 
                                                  <!-- Error -->
                                                  <?= ($validation->getError('contenedorid')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('contenedorid')."</span>" : ""; ?>     
                                            </div>

                                            <div class="form-group col-4">
                                                <label for="fechaEntrega">Fecha entrega:</label>
                                                <input type="date" class="form-control <?= ($validation->getError('fechaEntrega')) ? "is-invalid" : "" ?>" id="fechaEntrega" name="fechaEntrega" placeholder="fechaEntrega" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('fechaEntrega')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('fechaEntrega')."</span>" : ""; ?>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="paisDestino">Pais destino:</label>
                                                <input type="text" class="form-control <?= ($validation->getError('paisDestino')) ? "is-invalid" : "" ?>" id="paisDestino" name="paisDestino" placeholder="Pais destino" value="">
                                                <!-- Error -->
                                                <?= ($validation->getError('paisDestino')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('paisDestino')."</span>" : ""; ?>
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
