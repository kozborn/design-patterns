<?php

echo "<h3>Wzorce projektowe: Fabryka</h3>";

interface Product {
  public function getName();
}

class Mleko implements Product {
  public function getName() {
    return "Mleko";
  }
}

class Chleb implements Product {
  public function getName() {
    return "Chleb";
  }
}

interface Creator {
  public function create( $type );
}

class Order implements Creator{
  public function create( $type ) {
    switch ( $type ) {
    case 'Milk':
      return new Mleko();
      break;
    case 'Bread':
      return new Chleb();
      break;
    default:
      throw new Exception( "$type class cannot be created" );
    }
  }
}


$koszyk = new Order();
$item = $koszyk->create('Milk');
echo $item->getName() ."<br/>";

$item = $koszyk->create('Bread');
echo $item->getName() ."<br/>";
