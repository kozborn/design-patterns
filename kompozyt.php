<?php

echo "<h3>Wzorce projektowe: Kompozyt</h3>";

interface Component {
  public function operation();
  public function add( Component $c );
  public function remove( Component $c );
  public function getItem( $i );
}

class Composite implements Component {
  private $components = array();
  private $name;

  public function __construct( $name ) {
    $this->name = $name;
  }

  public function add( Component $c ) {
    if($c === $this){
      throw new Exception("If you add composite to itself then you'll have great problem with reccurence", 500);
    }
    $this->components[] = $c;
  }

  public function remove( Component $c ) {
    for ( $i = 0; $i < count( $this->components ); $i++ ) {
      if ( $this->components[$i] === $c ) {
        unset( $this->components[$i] );
      }
    }
    $this->components = array_filter( $this->components );
  }

  public function operation() {
    echo $this->name. "<br/>";
    foreach ( $this->components as $component ) {
      $component->operation();
    }
  }

  public function getItem( $i ) {
    return $this->components[$i] != null ? $this->components[$i] : null;
  }
}

class Leaf implements Component {

  private $name;

  public function __construct( $name ) {
    $this->name = $name;
  }

  public function add( Component $c ) {
    throw new Exception( "Cannot add component to leaf" );
  }

  public function remove( Component $c ) {
    throw new Exception( "Cannot remove component from leaf" );
  }

  public function getItem( $i ) {
    throw new Exception( "Cannot get component from leaf" );
  }

  public function operation() {
    echo ' - '.$this->name. '<br/>';
  }

}

$kompozyt = new Composite( 'Kompozytor' );
$leaf1 = new Leaf( 'leaf 1' );
$leaf2 = new Leaf( 'leaf 2' );

$kompozyt2 = new Composite( 'Kompozytor 2');

try{

  $kompozyt->add( $leaf1 );
  $kompozyt->add( $leaf2 );
  $kompozyt->operation();

  $kompozyt2->add($kompozyt);
  $kompozyt2->add($leaf2);
  $kompozyt2->operation();

}catch ( Exception $e ) {
  echo $e->getCode(). " -> ";
  exit( $e->getMessage() ) ;
}
