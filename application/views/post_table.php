<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($posts as $post) : ?>
      <tr>
        <th scope="row"><?php echo $post['id']; ?></th>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo $post['description']; ?></td>
        <td><?php echo $post['date']; ?></td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>