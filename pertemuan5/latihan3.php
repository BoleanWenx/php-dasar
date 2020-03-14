<?php 
	$mahasiswa = [
		["Alfi", "1790343006", "TMJ", "alf@gmail.com"],
		["Syahri", "1790343012", "TMJ", "syahri@gmail.com"],
		["Ramadhana", "1790343024", "TMJ", "ramadhana@gmail.com"]
	];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Latihan 3 | Array</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<?php foreach( $mahasiswa as $mhs) : ?>
		<ul>
			<li>Nama  : <?= $mhs[0]; ?></li>
			<li>NIM   : <?= $mhs[1]; ?></li>
			<li>Prodi : <?= $mhs[2]; ?></li>
			<li>Email : <?= $mhs[3]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>