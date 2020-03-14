<?php 
	// koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

	function query($query){
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

	// fungsi tambah
	function tambah($data){
		global $koneksi;

		// ambil data dari tiap elemen dalam form
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$prodi = htmlspecialchars($data["prodi"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$email = htmlspecialchars($data["email"]);
		
		// upload gambar
		$gambar = upload();
		if( !$gambar ) {
			return false;
		}

		// query insert data
		$query = "INSERT INTO Mahasiswa
						VALUES
					('', '$nama', '$nim', '$jurusan', '$prodi', '$alamat', '$email', '$gambar')
				 ";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// fungsi upload
	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang diupload
		if( $error === 4 ){
			echo "
				  <script>
					alert('pilih gambar terlebih dahulu');
				  </script>
				";
			return false;
		}

		// cek gambar atau bukan yang diupload
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "
				  <script>
					alert('yang anda upload bukan gambar');
				  </script>
				";
			return false;
		}

		// cek ukuran file
		if( $ukuranFile > 1000000){
			echo "
				  <script>
					alert('ukuran gambar terlalu besar');
				  </script>
				";
			return false;
		}

		// lolos pengecekan, gambar siap diupload
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		
		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;
	}

	// fungsi hapus
	function hapus($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($koneksi);
	}

	// fungsi ubah
	function ubah($data){
		global $koneksi;

		// ambil data dari tiap elemen dalam form
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$prodi = htmlspecialchars($data["prodi"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$email = htmlspecialchars($data["email"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);
		
		// cek apakah user pilih gambar baru atau tidak
		if( $_FILES['gambar']['error'] === 4 ) {
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}
		

		// query insert data
		$query = "UPDATE mahasiswa SET
						nama = '$nama',
						nim = '$nim',
						jurusan = '$jurusan',
						prodi = '$prodi',
						alamat = '$alamat',
						email = '$email',
						gambar = '$gambar'
					WHERE id = $id
				 ";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);

	}

	// fungsi cari
	function cari($keyword){
		$query = "SELECT * FROM mahasiswa
					 WHERE
					nama LIKE '%$keyword%' OR
					nim LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword' OR
					prodi LIKE '%$keyword%'
				 ";

		return query($query);
	}

	// fungsi registrasi
	function registrasi($data){
		global $koneksi;

		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($koneksi, $data["password"]);
		$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

		// cek username sudah ada atau belum
		$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
		if ( mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('Username sudah ada!');
				</script>
				";
			return false;
		}

		// cek konfirmasi paswrod
		if( $password != $password2){
			echo "
				<script>
					alert('konfirmasi password tidak sesuai!');
				</script>
				";
			return false;
		}
		
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);
		

		// tambahkan user baru ke db
		mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");

		return mysqli_affected_rows($koneksi);

	}
?>