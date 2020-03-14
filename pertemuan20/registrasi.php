<?php 
	require 'function.php';

	if ( isset($_POST["register"])) {

		if( registrasi($_POST) > 0 ){
			echo "
				<script>
					alert('user baru berhasil ditambahkan!');
				</script>
			";
		} else {
			echo mysqli_error($koneksi);
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Registrasi</title>
</head>
<body>
	<h1>Halaman Registrasi</h1>

	<form action="" method="post">
		<table border="0" cellpadding="10" cellspacing="0">
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username" id="username" autofocus></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<tr>
				<td><label for="password2">Confirm Password</label></td>
				<td><input type="password" name="password2" id="password2"></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="register">Sign Up</button></td>
			</tr>
		</table>
	</form>
</body>
</html>