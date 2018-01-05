<div class="container">
  <div>
    <h1>Edit Fruit</h1>

    <form action="/about/editItem/" method="POST">
      <input type="text" name="name" placeholder="Bananas" value="<?= $data['name'] ?>" />
      <?php $_SESSION['id'] = $data['id'] ?>
      <input type="submit" value="Submit" />
    </form>
  </div>
</div>