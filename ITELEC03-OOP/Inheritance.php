<?php

// Parent class
class Animal {
  public $name;
  public $color;

  function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }

  public function eat() {
    echo "The " . $this->name . " is eating.";
  }
}

// Child class that inherits from Animal
class Cat extends Animal {
  public function meow() {
    echo "The " . $this->color . " cat is meowing.";
  }
}

// Create objects
$animal1 = new Animal("Elephant", "Gray");
$cat1 = new Cat("Persian Cat", "White");

// Call methods
$animal1->eat();
$cat1->eat();
$cat1->meow();

?>

<!-- In this example, we have a parent Animal class with two properties (name and color) and one method (eat). We also have a child Cat class that extends Animal and adds one additional method (meow).

We create instances of both classes ($animal1 and $cat1) and call their respective methods (eat, meow) to demonstrate inheritance in action. -->