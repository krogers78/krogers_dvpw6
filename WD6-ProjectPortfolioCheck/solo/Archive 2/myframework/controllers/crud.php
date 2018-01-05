<?php
  class CRUD extends AppController {
    public function __construct() {}
    public function index() {
      // Build the base structure of the web page
      $this->getView('header', ['heading'=>'CRUD Page', 'description'=>'Brief Description of the page']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->getView('crud');
      $this->getView('footer');    
    }
  }
?>