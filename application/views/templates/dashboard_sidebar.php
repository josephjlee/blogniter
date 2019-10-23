

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-gripfire"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blogniter</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">      

      <!-- Dashboard -->
        <li class="nav-item <?= $title == 'Dashboard' ? ' active' : ''; ?>">
          <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Dropdown Nav Item -->
      <?php 
          $role_id      = $this->session->userdata('role_id');
          $menu_groups  = $this->dashboard->get_menu_groups($role_id);
      ?>

      <?php foreach ($menu_groups as $menu_group) : ?>

        <li class="nav-item <?= strtolower($menu_group['title']) == $this->uri->segment(1) ? ' active' : ''; ?>">
          <a class="nav-link <?= strtolower($menu_group['title']) == $this->uri->segment(1) ? '' : ' collapsed'; ?> pb-0" href="#" data-toggle="collapse" data-target="#<?= strtolower($menu_group['title']); ?>">
            <i class="<?= $menu_group['icon']; ?>"></i>
            <span><?= $menu_group['title'] ?></span>
          </a>
          
          <div id="<?= strtolower($menu_group['title']) ?>" class="collapse <?= strtolower($menu_group['title']) == $this->uri->segment(1) ? ' show' : ''; ?>" data-parent="#accordionSidebar">
            <div class="bg-transparent py-2 collapse-inner rounded">

              <?php $menus = $this->dashboard->get_menus($menu_group['id']); ?>
              <?php foreach($menus as $menu) : ?>

                <a class="collapse-item <?= $menu['title'] == $title ? ' active' : ''; ?>" href="<?= base_url($menu['url']) ?>"><?= $menu['title'] ?></a>

              <?php endforeach; ?>

            </div>
          </div>
        </li>

      <?php endforeach; ?>
      
      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->