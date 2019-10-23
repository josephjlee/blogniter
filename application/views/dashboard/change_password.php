  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>

    <?php if ($this->session->flashdata('message') == 'Updated') : ?>
      <div id="flash-msg" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php else : ?>
      <?= $this->session->flashdata('message'); ?>
    <?php endif; ?>    

    <div class="row">
      <div class="col-lg-6">

      <?php echo form_open_multipart('account/change_password'); ?>
        <div class="form-group">
            <label for="current-password">Current Password</label>
            <input type="password" class="form-control" id="name" name="current-password">
            <?= form_error('current-password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="new-password-1">New Password</label>
            <input type="password" class="form-control" id="new-password-1" name="new-password-1">
            <?= form_error('new-password-1', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="new-password-2">Repeat New Password</label>
            <input type="password" class="form-control" id="name" name="new-password-2">
            <?= form_error('new-password-2', '<small class="text-danger">', '</small>'); ?>
        </div>
       
      
        <div class="form-group-row">
          <div class="row justify-content-end">
            <div class="col-lg-3">
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