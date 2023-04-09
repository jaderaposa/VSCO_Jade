<?php

class MyClass {
    private $name;

    public function __construct($name) {
        $this->name = $name;
        echo "Creating object with name: " . $this->name . "<br>";
    }

    public function __destruct() {
        echo "Destroying object with name: " . $this->name . "<br>";
    }
}

$obj1 = new MyClass("Object 1");
$obj2 = new MyClass("Object 2");
$obj3 = new MyClass("Object 3");

unset($obj1);
?>