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
		$gambar = htmlspecialchars($data["gambar"]);

		// query insert data
		$query = "INSERT INTO Mahasiswa
						VALUES
					('', '$nama', '$nim', '$jurusan', '$prodi', '$alamat', '$email', '$gambar')
				 ";
		mysqli_query($koneksi, $query);

		return mysqli_affected_rows($koneksi);
	}

	// fungsi hapus
	function hapus($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
		return mysqli_affected_rows($koneksi);
	}
?>