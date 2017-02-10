<?php

use \PHPUnit_Framework_Assert as Assert;
use LPudzisz\Accountancy\Salary\Calculation\ContractTaxCalculation;

class ContractTaxCalculationTest extends \PHPUnit_Framework_TestCase {
  
  public function test_calculateFromGrossValue() {
    
    $calc = new ContractTaxCalculation();
    
    $wage = $calc->calculateFromGrossValue(2197.80);
    Assert::assertEquals($wage->getNetValue(), round(2000,2));

    $wage = $calc->calculateFromGrossValue(4395.60);
    Assert::assertEquals($wage->getNetValue(), round(4000,2));
    
  }

}