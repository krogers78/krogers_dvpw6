<section class="container">
  <h2>Thanks for signing up!</h2>
  <p>User Information:</p>
  <p>Username: <?= $data['username'] ?></p>
  <p>Password: <?= $data['password'] ?></p>
  <p>Bio: <?= $data['bio'] ?></p>
  <p>Sex: <?= $data['sex'] ?></p>
  <p>Newsletter <?= isset($data['newsletter'])?'Yes':'No' ?></p>
  <p>Age: <?= $data['age'] ?></p>
</section>