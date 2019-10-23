  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg">

        <div class="card mb-3 border-left-info shadow p-3 mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?= $user['name'] ?></h5>
                <p class="card-text"><?= $user['role_id'] == 1 ? 'Administrator' : 'Member'; ?></p>
                <a href="<?= base_url('account/edit_profile/'); ?>" class="btn btn-primary">Edit Profile</a>
                <a href="<?= base_url('account/change_password/'); ?>" class="btn btn-primary">Change Password</a>
              </div>
            </div>
          </div>
        </div>

        
    </div>
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->