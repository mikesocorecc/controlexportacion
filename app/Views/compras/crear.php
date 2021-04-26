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
              <h1>Compras</h1>              
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url()?>/compras">Inicio</a></li>
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
                  <form action="<?= base_url() ?>/compras/store" method="post" >
                          <div class="card card-outline card-info">
                                  <div class="card-header">
                                    <h3 class="card-title"><?= $titulo ?></h3>    
                                    <a href="<?= base_url() ?>/compras" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                            
                                  </div>
                                  <!-- /.card-header -->
                                  <?php $validation = \Config\Services::validation(); ?>
                                  <div class="card-body">                
                                      <div class="row">                                        
                                          <div class="form-group col-4">
                                                <label for="productoid">Producto:</label>
                                                <select class="form-control  <?= ($validation->getError('productoid')) ? "is-invalid" : "" ?>" name="productoid" id="productoid">
                                                  <option value="" selected disabled>---SELECCIONE PRODUCTO---</option>
                                                  <?php foreach ($productos as $producto) { ?>
                                                    <option value="<?= $producto->id ?>" ><?= $producto->producto ?></option>							
                                                  <?php } ?>
                                                </select> 
                                                  <!-- Error -->
                                                  <?= ($validation->getError('productoid')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('productoid')."</span>" : ""; ?>     
                                            </div>                                          
                                            <div class="form-group col-4">
                                                    <label for="proveedorid">Proveedor:</label>
                                                    <select class="form-control <?= ($validation->getError('proveedorid')) ? "is-invalid" : "" ?>" name="proveedorid" id="proveedorid" >
                                                    <option value=""  selected disabled >---SELECCIONE-PROVEEDOR---</option>
                                                      <?php foreach ($proveedores as $proveedor) { ?>
                                                        <option value="<?= $proveedor->id ?>" ><?= $proveedor->proveedor ?></option>							
                                                      <?php } ?>
                                                    </select> 
                                                    <!-- Error -->
                                                    <?= ($validation->getError('proveedorid')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('proveedorid')."</span>" : ""; ?>     
                                              </div> 
                                               <div class="form-group col-4">
                                                    <label for="precio">Precio:</label>
                                                    <input  readonly type="text" class="form-control <?= ($validation->getError('precio')) ? "is-invalid" : "" ?>" id="precio" name="precio" placeholder="Precio producto" value="">
                                                    <!-- Error -->
                                                    <?= ($validation->getError('precio')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('precio')."</span>" : ""; ?>
                                                </div>                                               
                                                <div class="form-group col-4">
                                                        <label for="cantidad">Cantidad:</label>
                                                        <input   type="number" class="form-control <?= ($validation->getError('cantidad')) ? "is-invalid" : "" ?>" id="cantidad" name="cantidad" placeholder="cantidad producto" value="">
                                                        <!-- Error -->
                                                        <?= ($validation->getError('cantidad')) ? "<span class='d-block error invalid-feedback'>".$validation->getError('cantidad')."</span>" : ""; ?>
                                                  </div>                                               
                                                   <div class="form-group col-8 d-flex justify-content-around align-items-end  ">                                                                                                      
                                                          <div class="w-25">
                                                            <button type="button" class="btn btn-success w-100 " id="agregarAlaLista"> <i class="fas fa-plus"></i> Agregar a la lista</button>                                                                               
                                                          </div>
                                                          <div class="w-25">
                                                            <button type="button" class="btn btn-warning w-100 " onclick="limpiarCampos()"><i class="fas fa-broom"></i> Limpiar campos</button>                                                                               
                                                          </div>
                                                    </div>  
                                              </div>
                                             
                                        <!-- Main content -->
                                       <div class="invoice p-3 mb-3">                                          
                                              <div class="row">
                                                <div class="col-12">
                                                  <h4>
                                                    <i class="fas fa-globe"></i> Listado de productos a comprar
                                                    <small class="float-right">Fecha: <?= date("d-m-Y") ?></small>
                                                  </h4>
                                                </div>                                  
                                              </div>            
                                              <!-- Table row -->
                                              <div class="row">
                                                <div class="col-12 table-responsive">
                                                  <table id="detalles" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                      <th>Accion</th>
                                                      <th>Cantidad</th>
                                                      <th>Producto</th>
                                                      <th>Precio</th>
                                                      <th>Proveedor</th>                      
                                                      <th>Subtotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                  </table>
                                                </div>
                                                <!-- /.col -->
                                              </div>
                                              <!-- /.row -->
                                              <div class="row">
                                                <!-- accepted payments column -->
                                                <div class="col-6">
                                          
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-6">
                                                  <div class="table-responsive">
                                                    <table class="table">
                                                      <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td id="total" >$ 0.00</td>
                                                      </tr>                                                                         
                                                      <tr>
                                                        <th >Total:</th>
                                                        <td id="total_pagar_html" >$ 0.00</td>
                                                        <input type="hidden" name="total_pagar" id="total_pagar">
                                                      </tr>
                                                    </table>
                                                  </div>                                   
                                                </div>
                                                <!-- /.col -->
                                              </div>
                                              <!-- /.row -->             
                                        </div>
                                        <!-- /.invoice -->
                                  </div>  
                                  <input type="hidden" name="usuarioid" value="<?= session("user_id") ?>"> 
                                  <div class="card-footer text-center">
                                      <button type="submit" class="btn btn-primary" id="guardar"> <i class="far fa-credit-card"></i> Realizar compra</button>
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
