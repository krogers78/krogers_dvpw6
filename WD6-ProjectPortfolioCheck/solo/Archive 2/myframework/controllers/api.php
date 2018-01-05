<?php
  class API extends AppController {
    public function __construct($parent) {
      $this->parent = $parent;
    }
    public function index() {
      // Build the base structure of the web page
      $this->getView('header', ['heading'=>'API Page', 'description'=>'Brief Description of the page']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->getView('api');
      $this->getView('footer');  
    }
    public function showApi() {
      $this->getView('header', ['heading'=>'API Page', 'description'=>'Brief Description of the page']);      
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $data = $this->parent->getModel('apiModel')->googleBooks('Henry David Theoreau');
      // $this->getView('api', $data);
      // Call the twitterApi method to run everything
      $this->twitterApi();
      $this->getView('footer');
    }
    public function twitterApi() {
      // Call the model to get the response
      $data = $this->parent->getModel('apiModel')->twitter();
      // send it to the api view
      $this->getView('api', $data);      
    }
  }
?>