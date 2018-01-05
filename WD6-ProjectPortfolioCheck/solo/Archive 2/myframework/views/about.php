<div class="container">
  <div class="starter-template">
    <!-- <h1>Boostrap starter template</h1> -->
    <p><a href="/about/addForm">Add Fruit</a></p>
    <?php
      foreach($data as $fruit) { ?>
        <div>
         <p><?= $fruit["name"] ?></p>
         <a href="/about/editForm/?id=<?= $fruit['id'] ?>" class="btn btn-primary">EDIT</a>
         <a href="/about/deleteItem/?id=<?= $fruit['id'] ?>" class="btn btn-primary">Delete</a>
        </div>
      <?php } ?>
  </div>
</div>