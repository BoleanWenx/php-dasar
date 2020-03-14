<?php 
	// ngenes amat hidup lu!!!
	$kelas_tkj = [
		[
			"nama" => "Alfi",
			"nisn" => "9993016633",
			"tgl_lahir" => "3-12-1999",
			"tempat_lahir" => "Utg",
			"alamat" => "Utg"
		],
		[
			"nama" => "riko",
			"nisn" => "9993016644",
			"tgl_lahir" => "1-1-1999",
			"tempat_lahir" => "krg",
			"alamat" => "krg"
		],
		[
			"nama" => "asriza",
			"nisn" => "9993016655",
			"tgl_lahir" => "26-10-1999",
			"tempat_lahir" => "Utg",
			"alamat" => "Utg"
		],
		[
			"nama" => "cia",
			"nisn" => "9993016666",
			"tgl_lahir" => "3-1-1999",
			"tempat_lahir" => "kota a",
			"alamat" => "Utg"
		],
		[
			"nama" => "fahmi",
			"nisn" => "9993016677",
			"tgl_lahir" => "2-2-1999",
			"tempat_lahir" => "kota b",
			"alamat" => "kota b"
		]
	];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Latihan 2 | array associative</title>
</head>
<body>
	<h2>daftar siswa tkj</h2>
	<p>angkatan ke-3 SMK N 1 DWT</p>
	<?php foreach($kelas_tkj as $siswa) : ?>
		<ul>
			<li>Nama : <?php echo $siswa["nama"]; ?></li>
			<li>NISN : <?php echo $siswa["nisn"]; ?></li>
			<li>Tanggal Lahir : <?php echo $siswa["tgl_lahir"]; ?></li>
			<li>Tempat Lahir : <?php echo $siswa["tempat_lahir"]; ?></li>
			<li>Alamat : <?php echo $siswa["alamat"]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>
</html>