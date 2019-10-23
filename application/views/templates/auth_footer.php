
  <!-- Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span class="<?= $this->uri->segment(2) == 'blocked' ? '' : 'text-white-50' ?>">Copyright &copy; Blogniter <?= date('Y') ?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

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
