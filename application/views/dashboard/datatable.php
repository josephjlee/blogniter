  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="h3 text-gray-800"><?= $title; ?></h1>
      <a href="<?= base_url() . $this->uri->segment(1) . '/create/'; ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-fw fa-plus"></i>
        Add New
      </a>
    </div>

    <div id="flash-msg" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-form="<?= $this->session->flashdata('form-name'); ?>"></div>
    
    <div class="card shadow mb-4">            
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <?php foreach ($table_headings as $table_heading) : ?>
                  <th><?= $table_heading ?></th>
                <?php endforeach; ?>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
    
      </div> <!-- card-body -->
    </div> <!-- card -->
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->