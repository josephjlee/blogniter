  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-4"><?= $title; ?></h1>

    <div id="flash-msg" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-form="<?= $this->session->flashdata('form-name'); ?>"></div>

    <div class="row">
      <div class="col-lg-6">

      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Menu</th>
            <th scope="col">Access</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $i = 1; ?>
            <?php foreach ($user_menus as $menu) : ?>
              <th scope="row"><?= $i; ?></th>
              <td><?= $menu['title']; ?></td>
              <td>
                <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $menu['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $menu['id']; ?>">
              </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    
      </div>
    </div>
   
    
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->