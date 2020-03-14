<?php 
	require 'function.php';
	$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Data Mahasiswa</a>
	<br><br>

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