  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg">

        <div class="card-deck">
          <?php foreach ($roles as $role) : ?>

          <div class="card border-left-info shadow mb-3">
            <div class="row no-gutters">
              <div class="col-md-4 p-2">
                <img src="<?= base_url('assets/images/' . $role['icon']) ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title"><?= $role['role']; ?></h5>
                  <p class="card-text"><?= $role['desc'] ?></p>
                  <a href="<?= base_url('access/manage/') . $role['id']; ?>" class="btn btn-primary">Manage Access</a>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach; ?>
        </div>

        
    
      </div>
    </div>
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->