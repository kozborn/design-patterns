<?php

echo "<h3>Wzorce projektowe: Obserwator</h3>";

interface Observable {
  public function attach( Observer $obs );
  public function detach( Observer $obs );
  public function notify();
}

/**
 * Here goes comment
 */

interface Observer{
  public function update( Observable $obs );
}

abstract class Person implements Observable, Observer{
  protected $observers = array();
  protected $name;

  public function __construct( $name ) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function attach( Observer $obs ) {
    $this->observers[] = $obs;
  }

  public function detach( Observer $obs ) {
    for ( $i = 0; $i < count( $this->observers ); $i++ ) {
      if ( $this->observers[$i] === $obs ) {
        $this->observers[$i] = null;
      }
    }
    $this->observers = array_filter( $this->observers );
  }

  public function notify() {
    foreach ( $this->observers as $obs ) {
      $obs->update( $this );
    }
  }

}

class Woman extends Person {

  public function changeSth() {
    echo $this->name. " change her skirt! <br/>" ;
    $this->notify();
  }

  public function update( Observable $obs ) {
    echo $this->name. " notice that ".$obs->getName()." shirt has been changed <br/>";
  }
}

class Man extends Person {

  public function changeSth() {
    echo $this->name. " change his shirt! <br/>" ;
    $this->notify();
  }

  public function update( Observable $obs ) {
    echo $this->name. " notice that ".$obs->getName()." skirt has been changed<br/>";
  }

}


$piotrek = new Man( "Piotrek" );
$ania = new Woman( "Ania" );
$grzesiek = new Man( "Grzesiek" );
$magda = new Woman( "Magda" );

$piotrek->attach( $ania );
$piotrek->attach( $magda );

$ania->attach( $piotrek );
$ania->attach( $magda );

$piotrek->changeSth();
$magda->changeSth();
$ania->changeSth();

$magda->attach( $piotrek );
$magda->changeSth();
$magda->detach( $piotrek );
$magda->attach( $ania );
$magda->changeSth();
$magda->detach( $ania );
$magda->changeSth();
