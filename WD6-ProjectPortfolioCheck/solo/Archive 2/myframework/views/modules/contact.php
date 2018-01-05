
<form class="container my-3" id="formsignup" action="/home/contactRecv" method="post">
  <!-- Username Input -->
  <p class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" <?= in_array('username', $data)?"style=\"border-color: red\"":'' ?> id="username" name="username" placeholder="jdoe">
  </p>
  <!-- Password Input -->
  <p class="form-group">
    <label for="password">Password (Must contain at least 6 characters)</label>
    <input type="password" class="form-control" <?= in_array('password', $data)?"style=\"border-color: red\"":'' ?> id="password" name="password">
  </p>
  <!-- Bio Input -->
  <p class="form-group">
    <label for="bio">Bio</label>
    <textarea name="bio" class="form-control" <?= in_array('bio', $data)?"style=\"border-color: red\"":'' ?>  id="bio" rows="5"></textarea>
  </p>
  <!-- Sex Inputs -->
  <div id="sex" <?= in_array('sex', $data)?"style=\"border: 1px solid red\"":'' ?> class="btn-group d-block" data-toggle="buttons">
    <p>Sex</p>
    <label class="btn btn-primary">
      <input type="radio" id="male" name="sex" value="male">
      Male
    </label>
    <label class="btn btn-primary">
      <input type="radio" id="female" name="sex" value="female">
      Female
    </label>
    <label class="btn btn-primary">
      <input type="radio" id="other" name="sex" value="other">
      Other
    </label>
  </div>
  <!-- Newsletter Sign Up Input -->
  <div class="btn-group d-block" data-toggle="buttons">
    <label class="btn btn-primary">
      <input type="checkbox" id="newsletter" name="newsletter" value="true">
      Sign up for the newsletter
    </label>
  </div>

    <div class="form-group">
    <label for="age">Age</label>
    <select class="form-control" <?= in_array('age', $data)?"style=\"border: 1px solid red\"":'' ?>  id="age" name="age">
      <option disabled selected value>Select an option</option>
      <!-- This will generate the options instead of making a huge select -->
      <?php 
        for ($i = 0; $i <= 100; $i++) { 
          if ($i == 100) { ?>
            <option value="<?= $i ?>+"><?= $i ?>+</option>
          <?php } else { ?>
            <option value="<?= $i ?>"><?= $i ?></option>
          <?php }
           } ?>
    </select>
  </div>
  <div>
    <?php require 'captchaCreate.php' ?>
    <label>Enter Captcha
      <input name="captcha" type="captcha" id="captcha"  placeholder="" <?= in_array('captcha', $data)?"style=\"border: 1px solid red\"":'' ?> >
    </label>
  </div>
  <!-- Button for submit -->
  <button class="btn btn-primary" id="signup">Sign Up</button>
  <input type="button" class="btn btn-primary" id="ajaxbtn" value="Ajax Submit">
</form>
