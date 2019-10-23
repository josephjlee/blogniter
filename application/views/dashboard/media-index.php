  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 text-gray-800"><?= $title; ?></h1>
      <a href="<?= base_url() . $this->uri->segment(1) . '/upload_image/'; ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-fw fa-plus"></i>
        Add New
      </a>
    </div>

    <div id="flash-msg" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-form="<?= $this->session->flashdata('form-name'); ?>"></div>

    <div class="row">
      <?php foreach ($images as $image) : ?>

        <div id="gallery-col" class="col-lg-2 mb-3 d-flex">        
          <a href="<?= base_url('media/edit/') . $image['id']; ?>">
            <img id="gallery-thumb" class="img-thumbnail" src="<?= base_url('assets/images/') . $image['url']; ?>">
          </a>
        </div>

      <?php endforeach; ?>
    </div>
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->