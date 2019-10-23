  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>
    
    <div class="row">
      <div class="col-lg-6">

      <?= $this->session->flashdata('message'); ?>

      <?= form_open_multipart( base_url('media/edit'), '', ['id' => $image['id']] ); ?>
        
        <div class="form-group row">
          <label for="name" class="col-lg-2 col-form-label">Title</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="title" name="title" value="<?= $image['title'] ?>">
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-lg-2 col-form-label">Alt-Text</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="alt" name="alt" value="<?= $image['alt'] ?>">
            <?= form_error('alt', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-2 col-form-label">Image</div>
          <div class="col-lg-10">              
            <img class="img-fluid" src="<?= base_url('assets/images/') . $image['url']; ?>">
          </div>
        </div>
      
        <div class="form-group-row">
          <div class="row justify-content-end">
            <div class="col-lg-10 d-flex">
              <a href="" data-href="<?= base_url('media/delete/') . $image['id']; ?>" id="btn-delete" class="btn btn-danger w-100 text-uppercase mr-3 text-link">Delete Image</a>
              <input type="submit" class="btn btn-primary w-100 text-uppercase" value="Update Image">
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