<div class="container pt-5 pb-3 mb-4">
  <div class="row">
    <div class="col-12">
      <h3 class="text-center">Welcome to CodeIgniter Blog</h3>
    </div>
  </div>
</div>

<div class="container">
  <div class="row row-cards row-deck">
      
    <?php foreach($posts as $post) : ?>

      <div class="col-4 card-group flex-wrap mb-4">
        <div class="card w-75">
          <img class="card-img-top" src="<?= base_url('assets/images/') . $post['post_image']; ?>" alt="And this isn&#39;t my nose. This is a false one.">
          <div class="card-body d-flex flex-column">
            <h4 class="card-title"><a href="<?= base_url('posts/') . $post['id']; ?>"><?= word_limiter($post['title'], 6); ?></a></h4>
            <p class="card-text text-muted"><?= word_limiter($post['body'], 30); ?></p>
            <div class="d-flex align-items-center pt-3 mt-auto">
              <div class="avatar avatar-md mr-3" style="background-image: url(./demo/faces/female/18.jpg)"></div>
              <div>
                <p><a href="<?= base_url('archives/user/') . $post['user_id']; ?>" class="text-default"><?= $post['post_author']; ?></a> | <a href="<?= base_url() . 'archives/category/' .$post['category_id']; ?>"><?= $post['post_category']; ?></a></p>
                <small class="d-block text-muted"><?= date('j F Y', strtotime($post['created_at'])); ?></small>
              </div>
            </div>
          </div> <!--card-body -->
        </div> <!--card -->
      </div> <!--col -->

    <?php endforeach; ?>

  </div>
</div>