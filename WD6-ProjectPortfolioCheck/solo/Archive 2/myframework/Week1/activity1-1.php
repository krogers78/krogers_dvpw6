<?php
  // 1) Complete Development Environment Setup and create a Hello World application: 

  class Person {
    // Variables to hold information for the object created
    protected $name;
    protected $age;
    protected $grade;

    // The constructor for the class
    function __construct($theName, $theAge, $theGrade) {
      $this->name = $theName;
      $this->age = $theAge;
      $this->grade = $theGrade;
    }
    // This is the method that will be called after instantiating the class
    function allTheInfo() {
      // Create the array for the name and age
      $person = ['0'=>$this->name, '1'=>$this->age];

      // 2) Users method created above to test functionality

      // 1. Echo out $name and $age using double quotes
      echo "My name is $this->name and age is $this->age.\n";
      // 2. Echo out $name and $age using single quotes
      echo 'My name is ' . $this->name . ' and age is ' . $this->age . ".\n";
      // 3. Echo out $name and $age using $personindex 0 and 1
      echo 'My name is ' . $person[0] . ' and age is ' . $person[1] . ".\n";
      // 4. Echo out name and age using key/value pairs in $person
      echo 'My name is ' . $person['0'] . ' and age is ' . $person['1'] . ".\n";
      // 5. Set the $age to null and echo out age – what is the result?
      $person[1] = null;
      echo $person[1];
      // 6. unset() the $name variable, and echo out name – What is the result?
      // unset($thePerson[0]);
      // echo $thePerson[0];


      // 3)Assign letter grades based on points earned. Using if/else/elseif 
      // statements, create a function that returns a letter grade based on the following point breakdowns when called:

      // Check each range of grade values to determine the letter grade
      if ($this->grade < 60) {
        echo "The grade of $this->grade is a F\n";
      } else if ($this->grade <= 69) {
        echo "The grade of $this->grade is a D\n";
      } else if ($this->grade <= 79) {
        echo "The grade of $this->grade is a C\n";
      } else if ($this->grade <= 89) {
        echo "The grade of $this->grade is a B\n";
      } else if ($this->grade <= 100 || $this->grade > 100) {
        echo "The grade of $this->grade is an A\n";
      }

      // 4) Create an array indexed by integers. Create 5 solid color values 
      // for the even numbers (starting at 0, through 9), then a shade of that color for the successive odd number.

      // Create the array to hold the colors and shades
      $colorArr = [0=>'Purple', 1=>'Periwinkle', 2=>'Green', 3=>'Emerald', 4=>'Black', 5=>'Coal', 6=>'Blue', 7=>'Aquamarine', 8=>'White', 9=>'Eggshell'];

      // Loop through each item in the array with their key values
      foreach ($colorArr as $key => $item) {
        echo "Color $key is $item ";

        if ($key%2 != 0) {
          echo "\n";
        }
      }
    }
  }

  // Instantiate the object
  $newPerson = new Person('Kloe', 22, 60.01);
  // Call the method from the class to run all the code
  $newPerson->allTheInfo();
?>