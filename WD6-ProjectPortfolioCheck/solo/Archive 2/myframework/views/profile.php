<section class="container">
  <div class="col-md-12 col-xs-12">
    <form action="/profile/update" method="POST" enctype="multipart/form-data">
      <label class="btn btn-default btn-file" style="width: 110px;">Browse
        <input type="file" name="img" style="display:none;">
      </label>
      <input type="submit" value="Update" class="btn btn-primary">
    </form>
  </div>

  <!-- Populate the user's profile page with the information from the session -->
  <div class="header">
    <h1>Email: <?= $_SESSION['user'][0]['email'] ?></h1>
    <h4>Web Developer</h4>
    <p><?= $_SESSION['user'][0]['bio'] ?></p>
  </div>
</section>