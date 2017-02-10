<?php
use \LPudzisz\Accountancy\WorkCost\WorkCost;
use \PHPUnit_Framework_Assert as Assert;


class WorkCostTest extends \PHPUnit_Framework_TestCase {
  
 public function test_calculateCost() {    
    
    $calc = new WorkCost();
  	$cost = $calc->calculateCost(2500);    
    
    Assert::assertEquals($cost, round(3018.5,2));

    
  }

}