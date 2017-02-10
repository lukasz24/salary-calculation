<?php
namespace LPudzisz\Accountancy\Salary;

class Wage
{
  private $net;

  public function __construct($net)
  {
    $this->net = $net;
  }

  public function getNetValue()
  {
    return $this->net;
  }
}

