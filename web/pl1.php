<?php
include_once __DIR__.'/../vendor/autoload.php';

use LPudzisz\Accountancy\Application\SalaryService;

$dealType=$_GET['DealType'];
$grossValue = $_GET['gross'];


$salaryService = new SalaryService();
	$result = $salaryService->calculateSalary($dealType, $grossValue);
	$cost = $salaryService->calculateWorkCost($grossValue);
	
	?>
<html>
	<head>
		<title>Przeliczanie</title>
		<meta charset="UTF-8">
		<link href="style.css"  rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<div class="frame">
		<h2>Wynik:</h2>
			<?php
					echo sprintf(
					  'Netto: '."<b>".'%s'."</b><br>".'Brutto: '."<b>".'%s'."</b><br>".'Podatki dla rządu: '."<b>".'%s'."</b><br> Koszty pracy: <b>".'%s'."</b>",
					  $result->getNetValue(),
					  $grossValue,
					  $grossValue-$result->getNetValue(),
					  $cost
					);
			?>
			<br>
			<input type="button" value="Oblicz dla innej kwoty" onclick="window.open('pl.php', '_self')" />
			
		</div>
		<div id="stopka">
			
		</div>
	</body>
</html>

