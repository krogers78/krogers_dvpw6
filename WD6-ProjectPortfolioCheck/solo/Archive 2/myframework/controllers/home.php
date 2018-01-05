<?php
  class Home extends AppController {
    public function __construct() {
      // db conn
      // global information
    }
    public function index() {
      $this->getView('header', ['heading'=>'Home Page', 'description'=>'Brief Description of the page']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->getView('home');
      $this->getView('footer');      
     }
    public function contact() {
      $this->getView('header', ['heading'=>'Contact Page', 'description'=>'']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);

      $random = substr( md5(rand()), 0, 7);
      $this->getView('modules/contact', ['cap'=>$random]);      

      $this->getView('footer');            
     }
    public function contactRecv() {
      // store the errors
      $err = [];
      // Validate the Username
      if ($_POST['username'] == '' || preg_match("/^[a-zA-Z0-9-_]*$/", $_POST['username']) == 0) {
        array_push($err, 'username');
        
      }
      // Validate the Password    
      if ($_POST['password'] == '' || preg_match("/^[a-zA-Z0-9!@#$%]{6,}$/", $_POST['password']) == 0) {
        array_push($err, 'password');
      }
      // Validate the Bio     
      if ($_POST['bio'] == '') {
        array_push($err, 'bio');
      }
      // Validate the Sex
      if (!(isset($_POST['sex']))) {
        array_push($err, 'sex');
      }
      // Validate the Age
      if (!isset($_POST['age'])) {
        array_push($err, 'age');
      }
      
      // All errors are shown through conditionals in the HTML style attribute
      
      // Set up the view with the header and navigation
      $this->getView('header', ['heading'=>'Contact Page', 'description'=>'']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']); 
      
      if ($_POST['captcha'] != $_SESSION['captcha_string']){
        array_push($err, 'captcha');
      }
      $random = substr( md5(rand()), 0, 7);
      $err['cap'] = $random;
      // check to see if errors exit to determine with view to display
      if (count($err) > 1) {
        $this->getView('contactError');
        $this->getView('modules/contact', $err);
      } else {
        $this->getView('contactSuccess', $_POST);
      }
      $this->getView('footer');
     }
    public function ajaxParse() {
      // $this->getView('header', ['heading'=>'Contact Page', 'description'=>'']);      
      // $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact']);
      var_dump($_POST);
      // $this->getView('footer');
    }
  }
?>