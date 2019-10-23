  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>
    
    <div id="flash-msg" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-form="<?= $this->session->flashdata('form-name'); ?>"></div>

    <div class="row">
      <div class="col-lg-6">

      <?php echo form_open_multipart($form_action, '', $form_hidden = []); ?>
        
      <?php if ( isset($roles) ) : ?>
        <div class="form-group row">
          <label for="role" class="col-lg-2 col-form-label">Role</label>
          <div class="col-lg-10">
            <select name="role" id="role" class="custom-select">
              <?php foreach ($roles as $role) : ?>
                <option value="<?= $role['id'] ?>" <?= $role['id'] == $user_detail['role_id'] ? " selected" : ""; ?>><?= $role['role'] ?></option>
              <?php endforeach; ?>
            </select>  
            <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
      <?php endif; ?>

        <div class="form-group row">
          <label for="name" class="col-lg-2 col-form-label">Name</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="name" name="name" value="<?= $user_detail['name']; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-lg-2 col-form-label">Email</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="email" name="email" value="<?= $user_detail['email']; ?>" readonly>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-2 col-form-label">Picture</div>
          <div class="col-lg-10">
            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/images/profile/') . $user_detail['image']; ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label for="image" class="custom-file-label">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="form-group-row">
          <div class="row justify-content-end">
            <div class="col-lg-10">
              <input type="submit" class="btn btn-primary w-100" value="Update User" >
            </div>
          </div>
        </div>
      </form>

      </div>
    </div>
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->