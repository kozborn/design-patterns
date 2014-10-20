<?php

echo "<h3>Wzorce projektowe: Fasada</h3>";

interface Device {

  public function turnOn();
  public function turnOff();

}

class TV implements Device {

  public function turnOn(){
    echo "Tv on <br/>";
  }

  public function turnOff(){
    echo "Tv off <br/>";
  }

}

class Radio implements Device {

  public function turnOn(){
    echo "Radio on <br/>";
  }

  public function turnOff(){
    echo "Radio off <br/>";
  }

}

class Dvd implements Device {

  public function turnOn(){
    echo "Dvd on <br/>";
  }

  public function turnOff(){
    echo "Dvd off <br/>";
  }

}

class Fasada {
  private $tv;
  private $radio;
  private $dvd;

  public function __construct(TV $t, Radio $r, Dvd $d){
    $this->tv = $t;
    $this->radio = $r;
    $this->dvd = $d;
  }

  public function turnOn(){
    $this->tv->turnOn();
    $this->radio->turnOn();
    $this->dvd->turnOn();
  }

  public function turnOff(){
    $this->tv->turnOff();
    $this->radio->turnOff();
    $this->dvd->turnOff();
  }
}

$tv = new TV();
$r = new Radio();
$d = new Dvd();


$devices = new Fasada($tv, $r, $d);

$devices->turnOn();
$devices->turnOff();
