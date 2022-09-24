
<?php 

	$im = $_GET["image"];
	$idi = $_GET["idtow"];
	$idkl = $_GET["idkl"];
	$cena = $_GET["cena"];

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Kwiaty towar</title>
	<meta name="description" content="Piękne kwiaty">
	<meta name="keywords" content="Taktsang, Paro, Bhutan, Arashiyama, Kyoto, Japonia, Bryce Canyon, Utah, USA, Taj Mahal, Agra, Indie, Serengeti, Tanzania, Mu Cang Chai, Yen Bai, Wietnam">
	<meta name="author" content="DMYTRO SYSOIEV">	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">	
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap" rel="stylesheet">	
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->	
</head>
<body>
	<div class = "wrapper2">
		<div class = "kartleft">
			<img src = "img/<?php echo $im; ?>" width = 300px; height = 300px;>
			<div style = "clear: both;"></div>
			<p>Ilość:</p><p>Suma:</p><br>
			<input  type="text" id="myInput0" name="ilosc0" value="1" size="6" maxlength="4" oninput="myFunction()" >
			<input  type="text" id = "getsuma0" name="suma0" value="<?php echo $cena; ?>" size="7" readonly>	
		</div>
		<div class = "kartright">
			<form action = "zamowienie.php" method = "POST">
				<p id="zam">Zamówienie towaru:</p>
				Imię:<br>
				<input type="text" id = "imie" name="imie" value="" size="30" maxlength="30" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')"><br>
				Nazwisko:<br>
				<input type="text" name="nazw" value="" size="30" maxlength="30" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')"><br>
				Miasto:<br>
				<input type="text" name="mia" value="" size="30" maxlength="30" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')"><br>
				Ulica:<br>
				<input type="text" name="ul" value="" size="30" maxlength="30" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')"><br>
				Numer domu:<br>
				<input type="text" name="nr" value="" size="7" maxlength="9" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')"><br>
				Numer telefonu:<br>
				<input type="text" name="tel" value="" size="9" maxlength="9" required oninvalid="this.setCustomValidity('Wprowadż dane!')" oninput="setCustomValidity('')">		
				<input type="hidden" id="myInput" name="ilosc" value="1" size="9">	
				<input type="hidden" name="cena" value="<?php echo $cena; ?>" size="11" id = "cena">
				<input type="hidden" name="suma" value="<?php echo $cena; ?>" size="30" id = "getsuma"><br>
				<input type="hidden" name="ido" value="<?php echo $idi; ?>" size="30">
				<input type="hidden" name="idkli" value="<?php echo $idkl + 1; ?>" size="30">
				<input class = "sub" type = "submit" value="Zamów" name="wyslij">
			</form>		
		</div>	
	</div>
	
<script>

	function myFunction() {
		var x = document.getElementById("myInput0").value;
		document.getElementById("getsuma0").value = x * document.getElementById("cena").value;
		document.getElementById("getsuma").value = x * document.getElementById("cena").value;
		document.getElementById("myInput").value = x;
	}
		
</script>	
</body>
</html>