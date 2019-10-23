<main role="main" class="container pt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-10 blog-main">
      <div class="blog-post">

        <div class="blog-info text-center mb-5">
          <p class="blog-post-meta mb-0"><?php echo date('j F Y', strtotime($post['created_at'])); ?></p>
          <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
          <p class="blog-post-meta mb-0">by <a class="" href="<?php echo site_url() . 'archives/user/' .$post['user_id']; ?>"><?php echo $post['post_author']; ?></a> in <a class="" href="<?php echo site_url() . 'archives/category/' .$post['category_id']; ?>"><?php echo $post['post_category']; ?></a></p>  
        </div>

        <img src="<?php echo site_url() . 'assets/images/' . $post['post_image']; ?>" class="img-fluid">

        <p><?php echo $post['body']; ?></p>

      </div><!-- /.blog-post -->
    </div><!-- /.blog-main -->
  </div><!-- /.row -->
</main><!-- /.container -->