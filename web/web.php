<?php
include_once __DIR__.'/../vendor/autoload.php';

use LPudzisz\Accountancy\Application\SalaryService;

$dealType=$_GET['DealType'];
$grossValue = $_GET['gross'];


$salaryService = new SalaryService();
	$result = $salaryService->calculateSalary($dealType, $grossValue);
	$cost = $salaryService->calculateWorkCost($grossValue);
	/*
	print(
	  'net: %s, gross: %s, tax for gov: %s WorkCost: %s'."\n",
	  $result->getNetValue(),
	  $grossValue,
	  $grossValue-$result->getNetValue(),
	  $cost
	);
	*/
	?>
<html>
	<head>
		<title>Calculation</title>
		<meta charset="UTF-8">
		<link href="style.css"  rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<div class="frame">
		<h2>Result:</h2>
			<?php
					echo sprintf(
					  'Net: '."<b>".'%s'."</b><br>".'Gross: '."<b>".'%s'."</b><br>".'Tax for gov: '."<b>".'%s'."</b><br> Work cost: <b>".'%s'."</b>",
					  $result->getNetValue(),
					  $grossValue,
					  $grossValue-$result->getNetValue(),
					  $cost
					);
			?>
			<br>
			<input type="button" value="Calculate antoher value" onclick="window.open('index.php', '_self')" />
			
		</div>
		<div id="stopka">
			
		</div>
	</body>
</html>

