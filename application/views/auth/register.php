<div class="container-login">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Register</h1>
                </div>
                <form action="<?= base_url('auth/register'); ?>" method="POST">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Password">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Full Name" value="<?= set_value('full_name'); ?>">
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <hr>
                  <!--<a href="index.html" class="btn btn-google btn-block">
                    <i class="fab fa-google fa-fw"></i> Register with Google
                  </a>
                  <a href="index.html" class="btn btn-facebook btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                  </a>-->
                </form>
                <div class="text-center">
                  <a class="font-weight-bold small" href="<?= base_url(); ?>">Already have an account?</a>
                </div>
                <div class="text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>