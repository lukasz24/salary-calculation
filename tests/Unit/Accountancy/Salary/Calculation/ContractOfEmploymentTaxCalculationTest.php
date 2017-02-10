<?php

use \PHPUnit_Framework_Assert as Assert;
use LPudzisz\Accountancy\Salary\Calculation\ContractOfEmploymentTaxCalculation;

class ContractOfEmploymentTaxCalculationTest extends \PHPUnit_Framework_TestCase {
  
  public function test_calculateFromGrossValue() {
    
    $calc = new ContractOfEmploymentTaxCalculation();
    
    $wage = $calc->calculateFromGrossValue(2000);
    Assert::assertEquals($wage->getNetValue(), round(1459.48,2));

    $wage = $calc->calculateFromGrossValue(3500);
    Assert::assertEquals($wage->getNetValue(), round(2505.34,2));
    
  }

}