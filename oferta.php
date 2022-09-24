
<?php
	
	require_once "dbconnect.php";
	$connect = mysqli_connect($host, $user, $pass, $db) or die("Brak połączenia");
	$katalog = "SELECT `idtowara`, `nazwa`, `img`, `cena` FROM `kwiaty` WHERE `cenaold` = 0";
	$result = mysqli_query($connect, $katalog) or die("Problemy z odczytem danych");
	
	$idnumtow = "SELECT MAX(`idklienta`) FROM `klienci`";
	$result2 = mysqli_query($connect, $idnumtow) or die("Problemy z odczytem danych");
	$result2 = mysqli_fetch_assoc($result2);
		
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Oferta</title>
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
	<div class = "wrapper">   
		<div class = "header">
				<div class = "lefthead">
					<div class = "overlay">
						<div class = "toppng">
							<img src = "img/custom_top.png">
						</div>
						<a href = "index.php" ><p class ="plogo">Bukiet</p></a>
						<a href = "index.php" ><p class ="plogo2">kwiaciarnia</p></a>
						<div class = "logo">
							<img src = "img/logonew.png">
							<div style = "clear: both;"></div>						
						</div>					
					</div>					
				</div>			
				<div class = "righthead">
					<div class = "nav">
						<ol>
							<li><a href="index.php">Home</a></li>
							<li><a href="dostawa.php">Dostawa</a></li>		
							<li><a href="oferta.php">Oferta</a>			
							<li><a href="kontakt.php">Kontakt</a></li>
						</ol>
					</div>
					<div class = "registration">
						<img class="phoneimg" src="img/demo/phone.png" alt="" border="0">
						<p>+48 645 645 645</p>
						<p>Czas pracy: 9:00-18:00</p>
					</div>
				</div>	
		</div>	
		<div class = "top2"></div>			
		<div class = "promo">
			<h1>Kwiaty na zamówienie</h1><br>	
			<?php
				while($kat = mysqli_fetch_assoc($result))
				{
					?>
					<div class = "kartka">
						<div class = "imagepromo">
							<img src = "img/<?php echo $kat['img']; ?>" width = 240px; height = 240px;>
						</div>
						<div class = "popup-image">
								<span>&times;</span>
								<img src = "img/<?php echo $promo['img']; ?>" width = 500px height = 500px>		
						</div>
						<div><?php echo $kat['nazwa']; ?></div><br>
						<div class = "actualcena"><?php echo $kat['cena']; ?> zl</div>
						<div class = "zamowienie">
							<form action = "kartka.php" method = "GET">
								<input type = "hidden" name = "image" value = "<?php echo $kat['img']; ?>">
								<input type = "hidden" name = "idtow" value = "<?php echo $kat['idtowara']; ?>">
								<input type = "hidden" name = "cena" value = "<?php echo $kat['cena']; ?>">
								<input type = "hidden" name = "idkl" value = "<?php echo $result2['MAX(`idklienta`)']; ?>">
								<input type = "submit"  value = "Zamów" class = "zamow">
							</form>
						</div>				
					</div>
					<?php			
				}
			mysqli_close($connect);
			?>
		</div>
		<footer class = "footer">
			<div class = "fmenu">
				<ol>
					<li><a href="index.php">Home</a></li>
					<li><a href="dostawa.php">Dostawa</a></li>		
					<li><a href="oferta.php">Oferta</a></li>			
					<li><a href="kontakt.php">Kontakt</a></li>
				</ol>
			</div>
			<div class = "fadress">
				Sp. z o.o. "Bukiet"<br><br>
				tel. +48 645 645 645<br><br>
				e-mail: bukietpl@gmail.com<br><br>
				ul. Rzeczna 56a<br><br>
				03-794 Warszawa Targówek<br><br>
				NIP: 1121211222<br>				
			</div>
			<div class = "socials">
				<img class="cus-imag1" src="img/demo/social_bg.png" alt="" border="0">
				<a class="custom_social" href="https://www.facebook.com/"><img src="img/demo/facebook.png" alt="facebook" title="facebook" border="0"></a>
				<a class="custom_social" href="https://twitter.com/"><img src="img/demo/twitter.png" alt="twitter" title="twitter" border="0"></a>
				<a class="custom_social" href="https://www.youtube.com/"><img src="img/demo/youtube.png" alt="youtube" title="youtube" border="0"></a>
				<a class="custom_social" href="https://www.instagram.com/"><img src="img/demo/instagram.png" alt="instagram"  title="instagram" border="0"></a>
			</div>
			<div class = "clear"></div>
			<div class = "author"><p>2022 by Dmytro Sysoiev. INF.03</p></div>
		</footer>	
	</div>
<script>

document.querySelectorAll('.imagepromo img').forEach(image =>{
	image.onclick = () =>{
		document.querySelector('.popup-image').style.display = 'block';
		document.querySelector('.popup-image img').src = image.getAttribute('src');
	}	
});

document.querySelector('.popup-image span').onclick = () =>{
	document.querySelector('.popup-image').style.display = 'none';
}

</script>
</body>
</html>