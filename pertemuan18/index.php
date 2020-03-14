<?php 
	session_start();
	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	require 'function.php';

	// pagination
	// konfigurasi
	$jumlahDataPerhalaman = 3;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
	$halamanAktif = ( isset($_GET["halaman"]) ? $_GET["halaman"] : 1);
	$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;

	$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

	// jika tombol cari ditekan
	if ( isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.aktif{
			font-weight: bold;
			color: #ff009c;
		}
	</style>
</head>
<body>
	<a href="logout.php">Logout</a>

	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="25" autofocus autocomplete="off" placeholder="masukkan nama mahasiswa">
		<button type="submit" name="cari">SEARCH</button>
	</form>
	<br>

	<!-- navigasi pagination -->
	<?php if( $halamanAktif > 1 ) : ?>
		<a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo</a>
	<?php endif; ?>

	<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if( $i == $halamanAktif) : ?>
			<a class="aktif" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if( $halamanAktif < $jumlahHalaman ) : ?>
		<a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo</a>
	<?php endif; ?>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>NO.</th>
			<th>AKSI</th>
			<th>GAMBAR</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JURUSAN</th>
			<th>PRODI</th>
			<th>ALAMAT</th>
			<th>EMAIL</th>

		</tr>
		
		<?php $i=1; ?>
		<?php foreach( $mahasiswa as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">UBAH</a> | 
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">HAPUS</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
			<td><?= $row["nim"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td><?= $row["prodi"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td><?= $row["email"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
</body>
</html>