<?php 
	session_start();
	if ( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
	
	require 'function.php';
	// cek apakah tombol submit sudah ditekan atau belum
	if( isset($_POST["submit"]) ){
		// var_dump($_POST); 
		// var_dump($_FILES); die;
		// cek apakah data berhasil ditambahkan atau tidak
		if ( tambah($_POST) > 0 ) {
			echo "
				<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('data gagal ditambahkan!');
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
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<table border="0" cellpadding="10" cellspacing="0">
			<tr>
				<td><label for="nama">Nama :</label></td>
				<td><input type="text" name="nama" id="nama"></td>
			</tr>
			<tr>
				<td><label for="nim">Nim :</label></td>
				<td><input type="text" name="nim" id="nim"></td>
			</tr>
			<tr>
				<td><label for="jurusan">Jurusan :</label></td>
				<td><input type="text" name="jurusan" id="jurusan"></td>
			</tr>
			<tr>
				<td><label for="prodi">Prodi :</label></td>
				<td><input type="text" name="prodi" id="prodi"></td>
			</tr>
			<tr>
				<td><label for="alamat">Alamat :</label></td>
				<td><textarea name="alamat" id="alamat" cols="21" rows="5"></textarea></td>
			</tr>
			<tr>
				<td><label for="email">Email :</label></td>
				<td><input type="text" name="email" id="email"></td>
			</tr>
			<tr>
				<td><label for="gambar">Gambar :</label></td>
				<td><input type="file" name="gambar" id="gambar"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="submit">Tambah Data!</button></td>
			</tr>
		</table>
	</form>
</body>
</html>