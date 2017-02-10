<?php
namespace LPudzisz\Accountancy\Application;

use LPudzisz\Accountancy\Salary\Wage;
use LPudzisz\Accountancy\Salary\Calculation\ContractTaxCalculation;
use LPudzisz\Accountancy\Salary\Calculation\OrderTaxCalculation;
use LPudzisz\Accountancy\Salary\Calculation\ContractOfEmploymentTaxCalculation;

use LPudzisz\Accountancy\WorkCost\WorkCost;

class SalaryService
{
  public function calculateSalary($dealType, $gross)
  {
  	if($dealType == "contract"){
	    $calc = new ContractTaxCalculation();
	    $wage = $calc->calculateFromGrossValue($gross);
		}
	else if($dealType == "order"){
		$calc = new OrderTaxCalculation();
	    $wage = $calc->calculateFromGrossValue($gross);
	}
	else if($dealType == "employContract"){
		$calc = new ContractOfEmploymentTaxCalculation();
	    $wage = $calc->calculateFromGrossValue($gross);
	}
    return $wage;
  }
  public function calculateWorkCost($gross) {
  	$calc = new WorkCost();
  	$cost = $calc->calculateCost($gross);
     return $cost;
  }
}
