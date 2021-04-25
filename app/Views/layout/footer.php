<?php if(uri_string() != "login"): ?> 
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; <?= date("Y") ?> <a href="http://codigos-mk.rf.gd/">codigos-mk.rf.gd </a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

<?php endif; ?>
  <!-- jQuery -->
  <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <!-- File Input -->
  <script src="<?= base_url() ?>/public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- InputMask -->
<script src="<?= base_url() ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url() ?>/public/plugins/toastr/toastr.min.js"></script>
<!-- sweetalert2.min -->
<script src="<?= base_url() ?>/public/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!--  -->
  <script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/public/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/public/dist/js/demo.js"></script>
  <!-- AJAX -->
  <script src="<?= base_url() ?>/public/dist/js/ajax.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        }            
    } );
    // File iNput
    bsCustomFileInput.init();    
    });

      // Toastr
      $('.toastrDefaultSuccess').click(function() {
      toastr.success('¡Exitoso! Registro agregado correctamente.')
    });
    
    function cerrar(){  
      $("#toastsContainerTopRight").fadeOut(1500);
    }
     
  </script>

</body>

</html>