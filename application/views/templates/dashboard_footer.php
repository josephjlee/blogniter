<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Blogniter <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- All Purpose Scripts (REQUIRED) -->
  <?php

      $all_files = scandir( FCPATH . 'assets/js/all-purpose/' );
      $excluded_scripts = ['.', '..', 'bootstrap.bundle.min.js.map', 'jquery.min.map'];
      $generic_scripts = array_diff($all_files, $excluded_scripts);
      // print_debugger($generic_scripts);
  
  ?>

<?php foreach ($generic_scripts as $generic_script) : ?>
  <script src="<?= base_url('assets/js/all-purpose/') . $generic_script; ?>"></script>
<?php endforeach; ?>

  <!-- Scripts for this pages-->
<?php if (isset($custom_scripts)) : ?>
  <?php foreach ($custom_scripts as $custom_script) : ?>
    <script src="<?= base_url('assets/js/unique/') . $custom_script; ?>.js"></script>
  <?php endforeach; ?>
<?php endif; ?>

  
</body>

</html>
