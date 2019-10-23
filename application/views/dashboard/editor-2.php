  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800 mb-3"><?= $title; ?></h1>


  <?php echo validation_errors(); ?>
  <?php echo form_open_multipart($form_action, '', $form_hidden = []); ?>

    <div class="row d-flex">

      <div class="col-9 d-flex flex-column">  
        <div class="form-group">
          <input type="text" id="post-title" class="form-control" name="title" value="<?= $post['title'] ?? ''; ?>">
        </div>
        <div class="form-group">
          <textarea type="text" id="editor" class="form-control" name="body"><?= $post['body'] ?? ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100 text-uppercase"><?= $this->uri->segment(2); ?></button>
      </div>
      <div class="col-3">
        <div class="card p-3 mb-4">
          <div class="form-group">
            <label for="" class="d-block">Post Slug</label>
            <input type="text" id="post-slug" class="form-control" name="slug" value="<?= $post['slug'] ?? ''; ?>">
          </div>
        </div> 
        <div class="card p-3 mb-4">
          <div class="form-group">
            <label for="category_id" class="d-block">Category</label>
            <select name="category_id" class="form-control">

            <?php if (isset($post)) : ?>
              <?php foreach($categories as $category) : ?>
                <option value="<?= $category['id']; ?>" <?= $category['id'] == $post['category_id'] ? " selected" : ""?>>
                  <?= $category['name']; ?>
                </option>
              <?php endforeach; ?>
            <?php else : ?>
              <?php foreach($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
              <?php endforeach; ?>
            <?php endif; ?>
              
            </select>
          </div>
        </div>
        <div class="card p-3 mb-4">
          <?php if (isset($post)) : ?>
            <img src="<?= site_url('assets/images/') . $post['post_image']; ?>" class="img-thumbnail">
          <?php endif; ?>
          <div class="form-group">
            <label for="" class="d-block">Upload Image</label>
            <input type="file" name="userfile" size="20"">
          </div>
        </div>
      </div> 

    </div> <!-- row -->

  <?php echo form_close(); ?>




