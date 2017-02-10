<?php
namespace LPudzisz\Accountancy\WorkCost;


class WorkCost
{
  const SOCIAL = 0.0976;
  const RENT = 0.065;
  const ACCIDENT = 0.0193;
  const WORK = 0.0245;
  const BENEFITS = 0.001;

  public function calculateCost($gross) {
     return (round($gross + $gross * self::SOCIAL + $gross * self::RENT + $gross * self::ACCIDENT + $gross * self::WORK + $gross * self::BENEFITS , 2));
  }
}