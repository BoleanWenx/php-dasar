<?php 
	require 'function.php';

	// ambil data di url
	$id = $_GET["id"];

	// query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
	
	// cek apakah tombol submit sudah ditekan atau belum
	if( isset($_POST["submit"]) ){
		// cek apakah data berhasil ditambahkan atau tidak
		if ( ubah($_POST) > 0 ) {
			echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "<script>
					alert('data gagal diubah!');
					document.location.href = 'index.php';
				</script>
			";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<table border="0" cellpadding="10" cellspacing="0">
			<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
			<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
			<tr>
				<td><label for="nama">Nama :</label></td>
				<td colspan="2"><input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="nim">Nim :</label></td>
				<td colspan="2"><input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="jurusan">Jurusan :</label></td>
				<td colspan="2"><input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="prodi">Prodi :</label></td>
				<td colspan="2"><input type="text" name="prodi" id="prodi" value="<?= $mhs["prodi"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="alamat">Alamat :</label></td>
				<td colspan="2"><input type="text" name="alamat" id="alamat" value="<?= $mhs["alamat"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="email">Email :</label></td>
				<td colspan="2"><input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>"></td>
			</tr>
			<tr>
				<td><label for="gambar">Gambar :</label></td>
				<td><img src="img/<?= $mhs['gambar']; ?>" width="70"></td>
				<td><input type="file" name="gambar" id="gambar"></td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit" name="submit">Ubah Data!</button></td>
			</tr>
		</table>
	</form>
</body>
</html>