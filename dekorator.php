<?php

echo "<h3>Wzorce projektowe: Dekorator</h3>";

interface Car {
  public function display();
}

class Mercedes implements Car {

  public function display(){
    echo "Mercedes <br/>";
  }

}

class Fiat implements Car {
  public function display(){
    echo "Fiat <br/>";
  }
}

class Klimatyzacja implements Car {

  protected $dekorator;

  public function __construct(Car $c){
    $this->dekorator = $c;
  }

  public function display(){
    $this->dekorator->display();
    echo " - Klimatyzacja <br/> ";
  }

}

class Alufelgi implements Car {

  protected $dekorator;

  public function __construct(Car $c){
    $this->dekorator = $c;
  }

  public function display(){
    $this->dekorator->display();
    echo " - Alufelgi <br/>";
  }

}

$car1 = new Mercedes();
$car2 = new Fiat();

$car1->display();
$car2->display();

$zklima1 = new Klimatyzacja(new Mercedes());
$zklima2 = new Klimatyzacja(new Fiat());

$zklima1->display();
$zklima2->display();

$alusy1 = new Alufelgi(new Mercedes());
$alusy2 = new Alufelgi(new Fiat());

$alusy1->display();
$alusy2->display();

$fullwypas1 = new Klimatyzacja(new Alufelgi(new Mercedes()));
$fullwypas2 = new Klimatyzacja(new Alufelgi(new Fiat()));

$fullwypas1->display();
$fullwypas2->display();