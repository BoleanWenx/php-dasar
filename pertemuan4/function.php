<?php 
	function salam($waktu = "Datang", $nama = "User"){
		// datang dan user untuk nilai default parameternya
		return "Selamat $waktu, $nama!";
	}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Latihan function</title>
 </head>
 <body>
 	<h1><?php echo salam(); ?></h1>
 </body>
 </html>