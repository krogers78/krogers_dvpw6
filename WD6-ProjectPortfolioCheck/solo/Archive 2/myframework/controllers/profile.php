<?php 
  class profile extends AppController {
    public function __construct() {
      if (@$_SESSION["loggedin"] && $_SESSION["loggedin"] == 1) {

      } else {
        header("Location:/home");
      }
    }
    public function index() {
      $this->getView('header', ['heading'=>'Home Page', 'description'=>'Brief Description of the page']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      // echo "This is a protected area";
      $this->getView('profile');
      $this->getView('footer');
    }
    public function update() {
      if ($_FILES["img"]["name"] != "") {
        $imageFileType = pathinfo('asset/' . $_FILES["img"]["name"], PATHINFO_EXTENSION);

        if (file_exists(pathinfo('asset/' . $_FILES["img"]["name"]))) {
          echo "Sorry, file exists";
        } else {
          if ($imageFileType != "jpg" && $imageFileType != "png") {
            echo "Sorry, this file type is not allowed";
          } else {
            if (move_uploaded_file($FILES["img"]["tmp_name"], "assets/" . $_FILES["img"]["name"])) {
              echo "File uplaoded";
            } else {
              echo "Error Uploading";
            }
          }
        }
        header("Location:/profile?msg=File Uploaded");
      }
    }
  }
?>