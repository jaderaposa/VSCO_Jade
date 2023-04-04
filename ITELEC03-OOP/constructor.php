<?php

class Person {
  public $name;
  public $age;

  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  public function introduce() {
    return "Hi, my name is " . $this->name . " and I am " . $this->age . " years old.";
  }
}

// Create objects
$person1 = new Person("John", 25);
$person2 = new Person("Jane", 30);

// Call introduce method on both objects
echo $person1->introduce() . "<br>";
echo $person2->introduce();

?>

<!-- In this example, we have a Person class with two properties - name and age. We also have a constructor method __construct which is called when an object of this class is created. The constructor takes two parameters - name and age, which are used to initialize the corresponding properties of the object.

We then have a method introduce which returns a string introducing the person by name and age.

Finally, we create two instances of the Person class, passing in different values for name and age to each. We then call the introduce method on both objects to display their introductions. -->