<?php

echo "<h3>Wzorce projektowe: Adapter</h3>";

interface Target{
  public function methodA();
}

class Adaptee {
  public function methodB() {
    echo "Method B <br/>";
  }
}

class Adapter implements Target{
  public function methodA() {
    $adaptee = new Adaptee();
    $adaptee->methodB();
  }
}

$client = new Adapter();
$client->methodA();
