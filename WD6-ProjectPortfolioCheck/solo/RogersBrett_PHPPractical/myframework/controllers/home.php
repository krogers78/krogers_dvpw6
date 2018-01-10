<?php
  class Home extends AppController {
    public function __construct($parent) {
      $this->parent = $parent;
    }
    // show the page with all the entries from the database
    public function index() {
      // databse call to get all entries
      $data = $this->parent->getModel('grades')->select("SELECT * FROM studentgrades");
      $this->getView('home', ['err'=>'', 'dbData'=>$data]);
     }
    //  fires when the new grade form is submitted
    public function newgrade() {
      // checks if the name input was empty and if the percent was a number
      if (is_numeric($_POST['spercent']) && !empty($_POST['sname'])) {
        // checks the grade percent to match it with a letter grade
        if ($_POST['spercent'] >= 90) {
          $this->parent->getModel('grades')->add('INSERT INTO studentgrades(studentname, studentpercent, studentlettergrade) VALUES(:sname, :spercent, :sletter)', [':sname'=>$_POST["sname"], ':spercent'=>$_POST['spercent'], ':sletter'=>'A']);
        } else if ($_POST['spercent'] >= 80) {
          $this->parent->getModel('grades')->add('INSERT INTO studentgrades(studentname, studentpercent, studentlettergrade) VALUES(:sname, :spercent, :sletter)', [':sname'=>$_POST["sname"], ':spercent'=>$_POST['spercent'], ':sletter'=>'B']);        
        } else if ($_POST['spercent'] >= 70) {
          $this->parent->getModel('grades')->add('INSERT INTO studentgrades(studentname, studentpercent, studentlettergrade) VALUES(:sname, :spercent, :sletter)', [':sname'=>$_POST["sname"], ':spercent'=>$_POST['spercent'], ':sletter'=>'C']);        
        } else if ($_POST['spercent'] >= 60) {
          $this->parent->getModel('grades')->add('INSERT INTO studentgrades(studentname, studentpercent, studentlettergrade) VALUES(:sname, :spercent, :sletter)', [':sname'=>$_POST["sname"], ':spercent'=>$_POST['spercent'], ':sletter'=>'D']);        
        } else {
          $this->parent->getModel('grades')->add('INSERT INTO studentgrades(studentname, studentpercent, studentlettergrade) VALUES(:sname, :spercent, :sletter)', [':sname'=>$_POST["sname"], ':spercent'=>$_POST['spercent'], ':sletter'=>'F']);        
        }
        // redirects to the index page
        header("Location:/home");
      } else {
        $data = $this->parent->getModel('grades')->select("SELECT * FROM studentgrades");
      
        $this->getView('home', ['err'=>'The name can\'t be empty and the percent must be a number!', 'dbData'=>$data]);
      }
    }
    // delete an entry from the datbase and redirect back home
    public function deleteGrade() {
      $this->parent->getModel('grades')->delete("DELETE FROM studentgrades WHERE studentid = :id", [":id"=>$_GET['id']]);
      header("Location:/home");
    }
    // Display the form to edit a grade while populating the form
    public function editForm() {
      $data = $this->parent->getModel('grades')->select("SELECT studentid, studentname, studentpercent FROM studentgrades WHERE studentid = :id", [':id'=>$_GET['id']]);
      $this->getView('editForm', $data);
    }
    // save the updated information
    public function editGrade() {
      // $data = $this->parent->getModel('grades')->update("UPDATE studentgrades SET studentname = :name WHERE id = :id", [":name"=>$_REQUEST['name'], ":id"=>$_SESSION['id']]);
      
      // checks if the name input was empty and if the percent was a number
      if (is_numeric($_POST['spercent']) && !empty($_POST['sname'])) {
        // checks the grade percent to match it with a letter grade
        if ($_POST['spercent'] >= 90) {
          $data = $this->parent->getModel('grades')->update("UPDATE studentgrades 
                                                            SET studentname = :sname, studentpercent = :spercent, studentlettergrade = :sletter 
                                                            WHERE studentid = :id", 
                                                            [":id"=>$_SESSION['id'], 
                                                             ":sname"=>$_POST['sname'], 
                                                             ":spercent"=>$_POST['spercent'], 
                                                             "sletter"=>"A"]);          
        } else if ($_POST['spercent'] >= 80) {
          $data = $this->parent->getModel('grades')->update("UPDATE studentgrades 
                                                            SET studentname = :sname, studentpercent = :spercent, studentlettergrade = :sletter 
                                                            WHERE studentid = :id", 
                                                            [":id"=>$_SESSION['id'], 
                                                             ":sname"=>$_POST['sname'], 
                                                             ":spercent"=>$_POST['spercent'], 
                                                             "sletter"=>"B"]);    
        } else if ($_POST['spercent'] >= 70) {
          $data = $this->parent->getModel('grades')->update("UPDATE studentgrades 
                                                            SET studentname = :sname, studentpercent = :spercent, studentlettergrade = :sletter 
                                                            WHERE studentid = :id", 
                                                            [":id"=>$_SESSION['id'], 
                                                             ":sname"=>$_POST['sname'], 
                                                             ":spercent"=>$_POST['spercent'], 
                                                             "sletter"=>"C"]);    
        } else if ($_POST['spercent'] >= 60) {
          $data = $this->parent->getModel('grades')->update("UPDATE studentgrades 
                                                            SET studentname = :sname, studentpercent = :spercent, studentlettergrade = :sletter 
                                                            WHERE studentid = :id", 
                                                            [":id"=>$_SESSION['id'], 
                                                             ":sname"=>$_POST['sname'], 
                                                             ":spercent"=>$_POST['spercent'], 
                                                             "sletter"=>"D"]);    
        } else {
          $data = $this->parent->getModel('grades')->update("UPDATE studentgrades 
                                                            SET studentname = :sname, studentpercent = :spercent, studentlettergrade = :sletter 
                                                            WHERE studentid = :id", 
                                                            [":id"=>$_SESSION['id'], 
                                                             ":sname"=>$_POST['sname'], 
                                                             ":spercent"=>$_POST['spercent'], 
                                                             "sletter"=>"F"]);    
        }
        // redirects to the index page
        header("Location:/home");
      }
    }
  }
?>