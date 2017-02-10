<?php

namespace LPudzisz\Accountancy\Salary\Calculation;

use LPudzisz\Accountancy\Salary\Wage;

class ContractOfEmploymentTaxCalculation
{
  const PENSION_TAX = 0.0976; //emerytalne
  const RENT_TAX = 0.015;     // rentowe
  const SICK_TAX = 0.0245;    // chorobowe
  const HEALTH_TAX = 0.09;    // zdrowotne
  const REDUC = 0.0775;  //kwota, o którą pomniejszamy zaliczkę na podatek:
  const OBTAINING_INCOME = 111.25;   // koszt uzyskania przychodu
  const TAX_RELIEF = 46.33;
  const TAX_1 = 0.18;           //podatek docodowy I
  const TAX_2 = 0.32;       // podatek dochodowy II


public function calculateFromGrossValue($gross) {
    $socialInsurance = $this->calculateSocialInsurance($gross);
    $taxBase = $this->calculateObtainingIncome($gross, $socialInsurance);
    $health = $this->calculateHealthTax($taxBase);
    $advanceIncomeTax = $this->calculateAdvanceIncomeTax($taxBase);
    $relief = $this->calculateRelief($taxBase);
    $incomeTax = $this->calculateIncomeTax($advanceIncomeTax, $relief);

   return new Wage(round($gross - $socialInsurance - $health - $incomeTax, 2));
  }

  private function calculateSocialInsurance($gross){
    return $gross*self::PENSION_TAX + $gross*self::RENT_TAX + $gross*self::SICK_TAX;
  }
  private function calculateObtainingIncome($gross, $socialInsurance){
    return $gross - $socialInsurance;

  }
  private function calculateHealthTax($socialInsurance){
    return round($socialInsurance*self::HEALTH_TAX, 2);
  }

  private function calculateRelief($taxBase){
    return $taxBase*self::REDUC;
  }
  private function calculateAdvanceIncomeTax($taxBase){
    $taxBase = $taxBase - self::OBTAINING_INCOME;
    $r = 0;
    if($taxBase < 85528/12){
      $r = round($taxBase * self::TAX_1, 2);
    }else{
      $r = round(14839/12 + (self::TAX_2 * ($taxBase - 85528/12)), 2);
    }
    $r = $r - self::TAX_RELIEF;
    return $r;
  }
  private function calculateIncomeTax($advanceIncomeTax, $relief){
    return round($advanceIncomeTax - $relief , 0);
  }


/*
  public function calculateFromGrossValue($gross) {
    $socialInsurance = $this->calculateSocialInsurance($gross);
    $taxBase = $this->calculateObtainingIncome($gross, $socialInsurance);
    $health = $this->calculateHealthTax($socialInsurance);
    $relief = $this->calculateRelief($socialInsurance);
    $incomeTax = $this->calculateIncomeTax($taxBase, $relief);

   return new Wage(round($gross - $socialInsurance - $health - $incomeTax, 2));
  }

  private function calculateSocialInsurance($gross){
    return $gross*self::PENSION_TAX + $gross*self::RENT_TAX + $gross*self::SICK_TAX;
  }
  private function calculateObtainingIncome($gross, $socialInsurance){
    return round($gross - $socialInsurance - self::OBTAINING_INCOME, 0);

  }
  private function calculateHealthTax($socialInsurance){
    return $socialInsurance*self::HEALTH_TAX;
  }
  private function calculateRelief($socialInsurance){
    return round($socialInsurance*self::DECREAS, 0);
  }
  private function calculateIncomeTax($taxBase, $relief){
    $r = 0;
    if($taxBase < 85528){
      $r = $taxBase * self::TAX_1 - self::TAX_RELIEF - $relief;
    }else{
      $r = 14839 + (self::TAX_2 * ($taxBase - 85528));
    }
    return $r;
  }
  */
}
