<?php

use \PHPUnit_Framework_Assert as Assert;
use LPudzisz\Accountancy\Salary\Calculation\OrderTaxCalculation;

class OrderTaxCalculationTest extends \PHPUnit_Framework_TestCase {
  
  public function test_calculateFromGrossValue() {
    
    $calc = new OrderTaxCalculation();
    
    $wage = $calc->calculateFromGrossValue(2000);
    Assert::assertEquals($wage->getNetValue(), round(1712,2));

    $wage = $calc->calculateFromGrossValue(3500);
    Assert::assertEquals($wage->getNetValue(), round(3185,2));
    
  }

}