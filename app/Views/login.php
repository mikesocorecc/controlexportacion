<?= view('layout/header');?>


<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Codigos-</b>MK</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
                  <?php if(session()->getFlashdata('msg')):?>
                      <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                  <?php endif;?>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesion</p>
      <form action="<?= base_url() ?>/login/auth" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        <div class="row">                    
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
          </div>          
        </div>
      </form>           
    </div>
  </div>
</div>

<?= view('layout/footer');?>