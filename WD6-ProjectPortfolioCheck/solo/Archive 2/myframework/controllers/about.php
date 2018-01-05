<?php
  class about extends AppController {
    public function __construct($parent) {
      $this->parent = $parent;
      // $this->showList();
    }
    public function index() {
      $data = $this->parent->getModel('fruits')->select("SELECT * FROM fruit_table");
      $this->getView('header', ['heading'=>'About Page', 'description'=>'Brief Description of the page']);
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->getView('about', $data);
      $this->getView('footer');
    }
    public function showList() {
      $data = $this->parent->getModel('fruits')->select("SELECT * FROM fruit_table");
      $this->getView('about', $data);
    }

    public function addForm() {
      $this->getView('header', ['heading'=>'About Page', 'description'=>'Brief Description of the page']);
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->showList();
      $this->getView('addForm');
      $this->getView('footer');
    }
    public function addItem() {
      
      $this->parent->getModel('fruits')->add('INSERT INTO fruit_table(name) VALUES(:name)', [':name'=>$_REQUEST["name"]]);
      header("Location:/about");

    }
    public function editForm() {
      $data = $this->parent->getModel('fruits')->select("SELECT * FROM fruit_table WHERE id = :id", [":id"=>$_GET['id']]);
      $this->getView('header', ['heading'=>'About Page', 'description'=>'Brief Description of the page']);
      $this->getView('navigation', ['home'=>'Home','api'=>'API', 'crud'=>'CRUD', 'contact'=>'Contact', 'about'=>'About']);
      $this->getView('editForm', $data[0]);
      $this->getView('footer');
    }
    public function editItem() {
      $this->parent->getModel('fruits')->update("UPDATE fruit_table SET name = :name WHERE id = :id", [":name"=>$_REQUEST['name'], ":id"=>$_SESSION['id']]);
      header("Location:/about");
    }
    public function deleteItem() {
      $this->parent->getModel('fruits')->delete("DELETE FROM fruit_table WHERE id = :id", [":id"=>$_GET['id']]);
      header("Location:/about");
    }
  }
?>