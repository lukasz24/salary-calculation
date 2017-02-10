<?php

include_once __DIR__.'/../vendor/autoload.php';

use LPudzisz\Accountancy\Application\SalaryService;


$dealType = $argv[1];
$grossValue = $argv[2];




	$salaryService = new SalaryService();
	$result = $salaryService->calculateSalary($dealType, $grossValue);
	$cost = $salaryService->calculateWorkCost($grossValue);

	echo sprintf(
	  'Net: %s'."\n".'Gross: %s'."\n".'Tax for gov: %s'."\n".'Work cost: %s'."\n",
	  $result->getNetValue(),
	  $grossValue,
	  $grossValue-$result->getNetValue(),
	  $cost
	);





