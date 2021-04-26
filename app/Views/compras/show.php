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
              <h1>Detalle de la compra</h1>         
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
      <!-- /.container-fluid -->      
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">               
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title"><?= $titulo ?></h3>    
                  <a href="<?= base_url() ?>/compras" class="btn bg-gradient-info float-right"><i class="fas fa-chevron-left"> </i> Volver</a>                                              
                </div>
                <!-- /.card-header -->
                <div class="card-body">            
                <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Detalle de la compra
                    <small class="float-right"><b>Realizado:</b> <?= $compra->fechacompra ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">                  
                  <address>
                    <strong>Detalles del comprador</strong>                    
                    <br>
                   <b> Nombre: </b>
                    <?php foreach ($usuarios as $usuario ) {
                        if($usuario->user_id == $compra->usuarioid){ echo $usuario->first_name." ".$usuario->last_name; };
                    } ?> <br>                   
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">                                
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Compra # <?= $compra->id ?></b><br>                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>Producto</th>
                      <th>Proveedor</th>
                      <th>Precio</th>                      
                    </tr>
                    </thead>
                        <?php 
                        $total = 0;
                        foreach ($datos as $registro ) { ?>
                            <tr>
                                <td><?= $registro->cantidad ?></td>
                                <td>
                                    <?php foreach ($productos as $producto ) {
                                        if($producto->id == $registro->productoid ){ echo $producto->producto; };
                                    } ?>                                    
                                <td>
                                    <?php foreach ($proveedores as $proveedor ) {
                                        if($proveedor->id == $registro->proveedorid ){ echo $proveedor->proveedor; };
                                    } ?>                                     
                                <td><?php echo  $registro->precio; $total += $registro->cantidad * $registro->precio;  ?></td>                                
                            </tr>                        
                        <?php } ?>
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
                        <th>Total:</th>
                        <td>$ <?= $total; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->          
            </div>
            <!-- /.invoice -->
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
