<?php 
	session_start();

	if ( isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}

	require 'function.php';
	if ( isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		// cek username
		$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
		if ( mysqli_num_rows($result) === 1) {
			// kalo username ada, cek password
			$row = mysqli_fetch_assoc($result);
			if ( password_verify($password, $row["password"]) ) {
				// set session
				$_SESSION["login"] = true;

				header("Location: index.php");
				exit;
			}
		}

		$error = true;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Halaman Login</h1>

	<?php if ( isset($error) ) : ?>
		<p style="color: red; font-style: italic;">username / password salah</p>
	<?php endif; ?>
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
				<td colspan="2"><button type="submit" name="login">LOGIN</button></td>
			</tr>
		</table>
	</form>
	<p>Belum punya akun? <a href="registrasi.php">Register </a>sekarang.</p>
</body>
</html>