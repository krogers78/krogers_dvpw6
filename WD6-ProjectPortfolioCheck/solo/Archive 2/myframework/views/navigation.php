   <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="/">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php foreach ($data as $key => $item) { ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger 
              <?php
              // This will be able to check what page is clicked and apply the 
              // class of 'active' if the url matches the page selected based on the key
                if ($_SERVER['PHP_SELF'] == "/index.php/$key" || $_SERVER['PHP_SELF'] == "/index.php/home/$key") { 
                    echo 'active';
                  }
                  ?>" href="<?= ($key=='contact')?"/home/$key":($key=='api')?"/$key/showApi":"/$key" ?>">
                <?= $item ?>
              </a>
            </li>
          <?php  }; ?>
         </ul>
        <!-- Displays an error if the login is invalid -->
        <span style="color:red"><?= @$_REQUEST["msg"]?$_REQUEST["msg"]:'' ?></span>
        <!-- Checks if the user is logged in and displays a form or links to profile and logout -->
        <? if(@$_SESSION["loggedin"] && @$_SESSION["loggedin"] == 1) { ?>
            <form class="navbar-form navbar-right">
              <a href="/profile">Profile</a>
              <a href="/auth/logout">Log Out</a>
            </form>
        <? } else {?>
          <form action="/auth/login" class="navbar-form navbar-right" role="search" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Log In</button>
          </form>
        <? } ?>
      </div>
    </div>
  </nav>
  