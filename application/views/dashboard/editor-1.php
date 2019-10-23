<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 text-gray-800 mb-3"><?= $title; ?></h1>


  <?= validation_errors(); ?>
  <?= form_open_multipart($form_action, '', $hidden_value = []); ?>

    <div class="row d-flex category-form">

      <div class="col-9 d-flex flex-column">  
        <div class="form-group">
          <input type="text" id="post-title" class="form-control" name="name" value="<?= $category['name'] ?? ''; ?>" >
        </div>
        <div class="form-group">
          <textarea type="text" id="editor" class="form-control" name="description"><?= $category['description'] ?? ''; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100"><?= strtoupper($this->uri->segment(2)); ?></button>
      </div>
      <div class="col-3">
        <div class="card p-3 mb-4">
          <div class="form-group">
            <label for="" class="d-block">Category Slug</label>
            <input type="text" id="post-slug" class="form-control" name="slug" value="<?= $category['slug'] ?? ''; ?>" >
          </div>
        </div> 
      </div> 

    </div> <!-- row -->

  <?= form_close(); ?>


