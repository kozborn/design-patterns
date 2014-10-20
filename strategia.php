<?php

echo "<h3>Wzorce projektowe: Strategia</h3>";

interface Strategy{
  public function calculate($a, $b);
}

class AddStrategy implements Strategy{
  public function calculate($a, $b){
    return $a + $b;
  }
}

class MultiplyStrategy implements Strategy{
  public function calculate($a, $b){
    return $a * $b;
  }
}

class DiffStrategy implements Strategy{
  public function calculate($a, $b){
    return $a - $b;
  }
}

class DivStrategy implements Strategy{
  public function calculate($a, $b){
    return $a / $b;
  }
}

class ModStrategy implements Strategy{
  public function calculate($a, $b){
    return $a % $b;
  }
}

class Context {
  private $strategy;

  public function setStrategy(Strategy $s){
    $this->strategy = $s;
  }

  public function getStrategy(){
    return $this->strategy;
  }

  public function invokeStrategyMethod($a, $b){
    return $this->getStrategy()->calculate($a, $b);
  }

}

$kontekst = new Context();
$kontekst->setStrategy(new AddStrategy());
echo $kontekst->invokeStrategyMethod(2, 5);
echo "<br/>";

$kontekst->setStrategy(new MultiplyStrategy());
echo $kontekst->invokeStrategyMethod(2, 5);
echo "<br/>";

$kontekst->setStrategy(new DiffStrategy());
echo $kontekst->invokeStrategyMethod(2, 5);
echo "<br/>";

$kontekst->setStrategy(new DivStrategy());
echo $kontekst->invokeStrategyMethod(2, 5);
echo "<br/>";

$kontekst->setStrategy(new ModStrategy());
echo $kontekst->invokeStrategyMethod(5,2);
echo "<br/>";