<?php

interface Vehicle {
  public function drive();
  public function stop();
}


class Bike implements Vehicle {
  public function drive() {
    echo "Bike: drive <br/>";
  }

  public function stop() {
    echo "Bike: stop <br/>";
  }
}

class Car implements Vehicle {
  public function drive() {
    echo "Car: drive <br/>";
  }

  public function stop() {
    echo "Car: stop <br/>";
  }
}

echo "<h3>Interface</h3>";



echo "<pre>";
echo '
interface Vehicle {
  public function drive();
  public function stop();
}


class Bike implements Vehicle {
  public function drive() {
    echo "Bike: drive";
  }

  public function stop() {
    echo "Bike: stop ";
  }
}

class Car implements Vehicle {
  public function drive() {
    echo "Car: drive";
  }

  public function stop() {
    echo "Car: stop";
  }
}
';
echo "</pre>";


$car = new Car();
$bike = new Bike();

$bike->drive();
$car->drive();

$bike->stop();
$car->stop();
