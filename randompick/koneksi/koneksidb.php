<?php
	$servername = "localhost";
	$database = "randompick";
	$user_db = "root";
	$pass_db = "";

	//fungsi untuk mengkoneksikan ke database mysql
	$koneksidb = mysqli_connect($servername, $user_db, $pass_db, $database);
	if(!$koneksidb){
		echo "Koneksi Gagal";
		exit; //close koneksi
	}
	// else{
	// 	echo "Koneksi Berhasil";
	// }

?>