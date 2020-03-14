<?php 
// cek apakah ada data di $_GET
	if (!isset($_GET["nama"] || 
		!isset($_GET["nisn"] || 
		!isset($_GET["tgl_lahir"]) ||
		!isset($_GET["tempat_lahir"]) ||
		!isset($_GET["alamat"]) ))) {
		header("Location: latihan1.php");
		exit;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Siswa TKJ | GET</title>
</head>
<body>
	<ul>
		<li><?php echo $_GET["nama"]; ?></li>
		<li><?php echo $_GET["nisn"]; ?></li>
		<li><?php echo $_GET["tgl_lahir"]; ?></li>
		<li><?php echo $_GET["tempat_lahir"]; ?></li>
		<li><?php echo $_GET["alamat"]; ?></li>
	</ul>
</body>
</html>