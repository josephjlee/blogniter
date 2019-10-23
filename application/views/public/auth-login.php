

<div class="container">

  <div class="card o-hidden border-0 shadow-lg col-lg-6 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
            </div>

            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('auth') ?>" method="post" class="user">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
              </button>
            </form>

            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/register') ?>">Are you new? Create an account!</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>

