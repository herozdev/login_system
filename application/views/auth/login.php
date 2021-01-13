<!-- Login Content -->
<div class="container-login">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                </div>
                <?php
                echo $this->session->flashdata('message');
                ?>
                <form class="user" method="post" action="<?= base_url(); ?>">
                  <div class="form-group">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                </form>
                <hr>
                <div class="text-center">
                  <a class="font-weight-bold small" href="<?= base_url('auth/register'); ?>">Create an Account!</a>
                </div>
                <div class="text-center">
                  <a class="font-weight-bold small" href="<?= base_url('auth/forgot_password'); ?>">Forgot your account?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login Content -->