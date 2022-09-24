
<?php 

	require_once "dbconnect.php";
	$connect = mysqli_connect($host, $user, $pass, $db) or die("Bląd połączenia");
	$Imie = $_POST["imie"];
	$Nazwisko = $_POST["nazw"];
	$Miasto = $_POST["mia"];
	$Ulica = $_POST["ul"];
	$Dom = $_POST["nr"];
	$Telefon = $_POST["tel"];
	$idk = $_POST["idkli"];
	$idt = $_POST["ido"];
	$ilo = $_POST["ilosc"];
	$sum = $_POST["suma"];
	
	$rez = mysqli_query($connect, query: "INSERT INTO `klienci` (`idklienta`, `imie`, `nazwisko`, `miasto`, `ulica`, `mieszkanie`, `telefon`) VALUES (NULL, '$Imie', '$Nazwisko', '$Miasto', '$Ulica', '$Dom', '$Telefon')");
	if ($rez == false) {
		echo "Blad query";
	}

	$rez2 = mysqli_query($connect, query: "INSERT INTO `zamowienia`(`idzamowienia`, `idklienta`, `idtowara`, `ilosc`, `suma`, `status`) VALUES (NULL, '$idk', '$idt', '$ilo', '$sum', 'oczekiwanie')");
	if ($rez == false) {
		echo "Blad query";
	}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Kwiaty zamówienie</title>
	<meta name="description" content="Piękne kwiaty">
	<meta name="keywords" content="Taktsang, Paro, Bhutan, Arashiyama, Kyoto, Japonia, Bryce Canyon, Utah, USA, Taj Mahal, Agra, Indie, Serengeti, Tanzania, Mu Cang Chai, Yen Bai, Wietnam">
	<meta name="author" content="DMYTRO SYSOIEV">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" href="style2.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class = "over">
		<div class = "modal">
			<p>Dziękujemy za złożone zamówienie!<br>Nasz menedżer zadzwoni w ciągu godziny</p>
			<button onclick = "thref()">Nowe zamówienie</button>
			<button onclick = "thref2()">Glówna</button>
		</div>		
	</div>
<script>

	function thref(){
		document.location.href = "oferta.php";
	}
		
	function thref2(){
		document.location.href = "index.php";
	}
	
</script>
</body>
</html>