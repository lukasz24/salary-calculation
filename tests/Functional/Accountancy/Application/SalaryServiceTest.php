<?php

use LPudzisz\Accountancy\Application\SalaryService;
use \PHPUnit_Framework_Assert as Assert;

class SalaryServiceTest extends \PHPUnit_Framework_TestCase
{
  public function test_initializationSalary()
  {   
     $salaryService = new SalaryService();
  }
  public function test_calculationResultForContract()
  {
    $salaryService = new SalaryService();
    $calcResult = $salaryService->calculateSalary(
      'contract',
      2197.80
    );
    Assert::assertInstanceOf('/Accountancy/Salary/Wage' ,$calcResult);
    Assert::assertEquals($calcResult->getNetValue(), 2000);
  }
}

