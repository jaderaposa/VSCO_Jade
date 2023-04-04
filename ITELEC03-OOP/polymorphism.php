<?php

abstract class Shape {
  abstract public function area();
}

class Square extends Shape {
  private $side;

  public function __construct($side) {
    $this->side = $side;
  }

  public function area() {
    return $this->side * $this->side;
  }
}

class Circle extends Shape {
  private $radius;

  public function __construct($radius) {
    $this->radius = $radius;
  }

  public function area() {
    return pi() * $this->radius * $this->radius;
  }
}

// Create objects
$square1 = new Square(5);
$circle1 = new Circle(3);

// Call area method on both objects
echo "Area of square: " . $square1->area() . "<br>";
echo "Area of circle: " . $circle1->area();

?>

<!-- In this example, we have an abstract Shape class with an abstract method area. This means that any class that extends the Shape class must implement its own area method.

We then create two classes that extend the Shape class - Square and Circle. Each class implements its own version of the area method based on its specific shape.

Finally, we create instances of both the Square and Circle classes, and call their area methods to calculate their respective areas. Because each object has a different implementation of the area method, we are able to achieve polymorphism. -->