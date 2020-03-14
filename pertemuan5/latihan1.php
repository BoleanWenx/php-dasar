<?php 
// array
// variable yang dapat memiliki banyak nilai
// elemen pada array boleh memiliki lebih dari satu tipe data

$hari = ["Senin", "Selasa", "Rabu", "Kamis" , "Jum'at", "Sabtu", "Minggu"];

//menampilkan array
// bisa pake var_dump(); atau print_r();
var_dump($hari);
echo "<br><br>";
print_r($hari);

//menampilkan semua indeks pada array
echo "<br><br>";
for ($i=0; $i < 7 ; $i++) { 
	echo "$hari[$i] ";
}
?>