<div class="container pt-5 pb-4">
  <div class="row">
    <div class="col-12">
      <h2><?php echo $archive_data['name']; ?> Archive <small>(<?php echo count($posts); ?>  posts found</small>)</h2>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">


      <?php foreach($posts as $post) : ?>

        <div class="card mb-4">
          <div class="row no-gutters">
            <div class="col-4">
              <img src="<?php echo site_url() . 'assets/images/' . $post['post_image']; ?>" alt="" class="card-img">
            </div>
            <div class="col-8">
              <div class="card-body">
                <h4 class="card-title"><?php echo $post['title']; ?></h4>
                <p class="card-text"><?php echo word_limiter($post['body'], 30); ?></p>
                <a href="<?php echo site_url() . 'posts/' . $post['id']; ?>" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div> <!-- row -->
        </div> <!-- card -->
        
      <?php endforeach; ?>

    </div>
  </div>
</div>