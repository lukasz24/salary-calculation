<?php

namespace LPudzisz\Accountancy\Salary\Calculation;

use LPudzisz\Accountancy\Salary\Wage;

class ContractTaxCalculation
{
  const TAX_1 = 0.18;
  const COST_1 = 0.50;

  public function calculateFromGrossValue($gross)
  {
    /**
     * 1) koszt uzyksania przychodu
     * 1,5) Podstawa opodatkowaia 
     * 2) Nalaezny podatek
     * 3) brutto - podatek = netto 
     */
    $costs = $this->calculateIncomeCosts($gross);
    $taxBase = $this->calculateTaxBase($gross, $costs);
    $tax = $this->calculateTaxValue($taxBase);

    return new Wage(round($gross-$tax, 2));
  }

  private function calculateIncomeCosts($gross)
  {
    return $gross * self::COST_1;
  }

  private function calculateTaxValue($taxBase)
  {
    return $taxBase * self::TAX_1;
  }

  private function calculateTaxBase($gross, $costs)
  {
    return $gross - $costs;
  }
}
