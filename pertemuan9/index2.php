<?php 
	// koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

	// ambil data dari table mahasiswa
	$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

	// ambil data (fetch) mahasiswa dari object result
	// while ( $mhs = mysqli_fetch_assoc($result)) {
	// 	var_dump($mhs);
	// }

	// untuk munculin eror
	if( !$result ){
		echo mysqli_error($koneksi);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>NO.</th>
			<th>AKSI</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JURUSAN</th>
			<th>PRODI</th>
			<th>ALAMAT</th>
			<th>EMAIL</th>
		</tr>
		
		<?php $i=1; ?>
		<?php while( $row = mysqli_fetch_assoc($result)) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="">UBAH</a> | 
				<a href="">HAPUS</a>
			</td>
			<td><?= $row["nim"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
			<td><?= $row["prodi"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td><?= $row["email"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endwhile; ?>
	</table>
</body>
</html>