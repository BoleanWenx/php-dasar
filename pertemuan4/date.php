<?php 
	// function date untuk tampilkan tanggal
	 echo date("l, d-M-Y");

 	echo "<br><br>";

 	// time
 	echo time();

 	echo "<br><br>";

 	// menampilkan 100 hari kedepan, untuk 100 hari ke belakang ganti "+" dengan "-"
 	echo date("l, d-M-Y", time()+60*60*24*100);

 	echo "<br><br>";

 	// mktime untuk membuat sendiri detik
 	// mktime(0,0,0,0,0,0);
 	// jam, menit, detik, bulan, tanggal, tahun
 	// menampilkan hari apa dilahirkan
 	echo date("l", mktime(0,0,0,12,3,1999));

 	echo "<br><br>";

 	// strtotime
 	echo date("l", strtotime("3 dec 1999"));

 	// masih banyak function di php, liat di http://php.net
 ?>