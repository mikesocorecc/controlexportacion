<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>control-exportacion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/toastr/toastr.min.css">
  <!-- sweetalert2.min -->
    <script src="<?= base_url(); ?>/public/plugins/sweetalert2/sweetalert2.min.css"></script>  
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css" integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw==" crossorigin="anonymous" /> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
  <!-- Mis estilos -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/styles.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition  <?= (uri_string() == "login") ? "login-page" : "sidebar-mini" ?>">    
<!-- Alert -->    
<?php if(session()->getFlashdata('msg') && uri_string() != "login"):?>      
  <div id="toastsContainerTopRight" class="toasts-top-right fixed" ><div class="toast bg-<?= session("msg.type")?> show" role="alert" ><div class="toast-header"><strong class="mr-auto"><?= session("msg.title") ?></strong><small>Cerrar</small><button  type="button" class="ml-2 mb-1 close" onclick="cerrar()" ><span aria-hidden="true">×</span></button></div><div class="toast-body"><?= session("msg.body") ?></div></div></div>
  <?php session()->removeTempdata("msg"); ?>
<?php endif;  ?>
<!-- Alert -->
<!-- Esto me sirve para obtener la url base y usarla mediante ajax -->
<input type="hidden" id="base_url" value="<?= base_url() ?>" >
