  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>
    
    <div class="row">
      <div class="col-lg-6">

      <?= $this->session->flashdata('message'); ?>

      <?= form_open_multipart( base_url('media/upload_image') ); ?>
        
        <div class="form-group row">
          <label for="name" class="col-lg-2 col-form-label">Title</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
            <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-lg-2 col-form-label">Alt-Text</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alt" name="alt" value="<?= set_value('alt') ?>">
            <?= form_error('alt', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-2 col-form-label">Image</div>
          <div class="col-lg-10">              
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image" value="<?= set_value('image') ?>">
              <label for="image" class="custom-file-label">Choose file</label>
            </div>
          </div>
        </div>
      
        <div class="form-group-row">
          <div class="row justify-content-end">
            <div class="col-lg-10">
              <input type="submit" class="btn btn-primary w-100" value="Upload Image">
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