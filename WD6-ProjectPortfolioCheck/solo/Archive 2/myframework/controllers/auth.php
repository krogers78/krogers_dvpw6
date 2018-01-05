<?php 
  class auth extends AppController {
    public function __construct($parent) {
      $this->parent = $parent;
    }
    // auth login
    public function login() {
      // create an array to store the contents of the file
      // $arr = [];
      // open the file to get the contents
      // $file = file('./assets/users.txt');
      // loop throught the content by line and push to the $arr array
      // foreach ($file as $line_num => $line) {
      //   array_push($arr, $line);
      // }
      // blank array to store the users in session variable
      // $_SESSION['users'] = [];
      // explode the array at each pipe so that they each have their own array
      // foreach($arr as $a) {
      //   array_push($_SESSION['users'], explode('|', $a));
      // }
      // Will be used to determine if the user is a valid to the information in the file
      // $gooduser = 0;
      // loop through each user
      // foreach ($_SESSION['users'] as $u) {
        // Test if the request variables exist
        if ($_REQUEST["username"] && $_REQUEST["password"]) {
          
          $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
          $value = [":email"=>$_REQUEST["username"], ":password"=>sha1($_REQUEST["password"])];

          $data = $this->parent->getModel("users")->select($sql, $value);

          if ($data) {
            $_SESSION["loggedin"] = 1;
            $_SESSION['user'] = $data;
            
            header("Location:/home");
          } else {
            header("Location:/home?msg=Bad Login");
          }
          // Test to figure out if the user exists in the test file for a valid login
        //   if (strtolower($_REQUEST["username"]) == strtolower($u[0]) && strtolower($_REQUEST["password"]) == $u[1]) {
        //     // Store the current user in the session for the progile page
        //     $_SESSION['user'] = $u;
        //     // Mark this as a valid login
        //     $gooduser++;
        // }
      }
      // Check the value of the goooduser variable
      // if ($gooduser != 0) {
        
      //   $_SESSION["loggedin"] = 1;
      //     header("Location:/home");

      // } else {
      //   header("Location:/home?msg=Bad Login");
      // }
        
    }
  
    public function logout() {
      // session_destroy();
      $_SESSION['loggedin'] = 0;
      $_SESSION['user'] = '';
      header("Location:/home");
    }
  }
?>