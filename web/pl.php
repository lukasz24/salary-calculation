<html>
	<head>
		<title>Przeliczanie</title>
		<meta charset="UTF-8">
		<link href="style.css"  rel="stylesheet" type="text/css">
		
	</head>
	<body>
		<div class="window">
		<div class="frame">
			<form method='GET' action='pl1.php'>
				<fieldset>
				<legend><h2>Obliczanie wartości netto i kosztów pracy </h2></legend>
				<label><b>Wybierz rodzaj umowy:</b></label><br>
					<label>
				  		<input type="radio" name="DealType" value="contract" checked> Umowa o dzieło
					</label>
					<label>
					 	<input type="radio" name="DealType" value="order"> Umowa Zlecenie
					</label>
					<label>
					 	<input type="radio" name="DealType" value="employContract"> Umowa o pracę
					</label>
				
				<p><b><label>Wprowadź wartość brutto:</label></b></p>
					<label>Brutto: <input type="text" name="gross"></label>
					<input type="submit" value="Oblicz">
				</fieldset>
				
			</form>
			</div>
			<div id="stopka">
			<input type="button" value="Wersja anglojęzyczna" onclick="window.open('index.php', '_self')" />
		</div>
		</div>
	</body>
</html>