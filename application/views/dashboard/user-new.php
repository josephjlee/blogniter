  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
      <div class="col-lg-6">

      <form action="<?= base_url('users/create') ?>" method="post" class="user" id="create-user" data-name="User">
        <div class="form-group row">
          <label for="role" class="col-lg-4 col-form-label">Role</label>
          <div class="col-lg-8">
            <select name="role" id="role" class="custom-select">
              <?php foreach ($roles as $role) : ?>
                <option value="<?= $role['id'] ?>" <?= set_select('role', $role['id'], ($role['id'] ==  set_value('role', $role['id']))) ?>><?= $role['role'] ?></option>
              <?php endforeach; ?>
            </select>  
            <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="name" class="col-lg-4 col-form-label">Name</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-lg-4 col-form-label">Email</label>
          <div class="col-lg-8">
            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="password1" class="col-lg-4 col-form-label">Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="password1" name="password1">
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="password2" class="col-lg-4 col-form-label">Confirm Password</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" id="password2" name="password2">
            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
      
        <div class="form-row justify-content-end">
          <input type="submit" class="btn btn-primary" value="Create User">
        </div>
      </form>

      </div>
    </div>
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->