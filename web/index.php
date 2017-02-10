<html>
	<head>
		<title>Calculation</title>
		<meta charset="UTF-8">
		<link href="style.css"  rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<div class="window">
		<div class="frame">
			<form method='GET' action='web.php'>
				<fieldset>
				<legend><h2>Calculation net and labor costs </h2></legend>
				<label><b>Select type of contract:</b></label><br>
					<label>
				  		<input type="radio" name="DealType" value="contract" checked> Contract
					</label>
					<label>
					 	<input type="radio" name="DealType" value="order"> Order
					</label>
					<label>
					 	<input type="radio" name="DealType" value="employContract"> Employ Contract
					</label>
				
				<p><b><label>Enter gross salary:</label></b></p>
					<label>Gross: <input type="text" name="gross"></label>
					<input type="submit" value="Calculate">
				</fieldset>
				
			</form>
			</div>
			<div id="stopka">
			<input type="button" value="Polish Version" onclick="window.open('pl.php', '_self')" />
		</div>
		</div>
	</body>
</html>