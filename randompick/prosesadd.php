<?php
include_once("koneksi\koneksidb.php");
$hasil = $_POST["hasil"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$kete = $_POST["ket"];

$hasil1 = $_POST["hasilku"];
$nama1 = $_POST["namaku"];
$alamat1 = $_POST["alamatku"];
$kete1 = $_POST["keterangan"];

$hasil2 = $_POST["hasilnya"];
$nama2 = $_POST["namanya"];
$alamat2 = $_POST["alamatnya"];
$kete2 = $_POST["keter"];

mysqli_multi_query(
    $koneksidb, "INSERT INTO hasil(hasil_acak, nama, alamat, keterangan) values
    ('".$hasil."','".$nama."','".$alamat."','".$kete."'),
    ('".$hasil1."','".$nama1."','".$alamat1."','".$kete1."'),
    ('".$hasil2."','".$nama2."','".$alamat2."','".$kete2."')"
);

$simpan = mysqli_query($koneksidb, "DELETE FROM peserta where id IN ('".$hasil."','".$hasil1."','".$hasil2."')");

if($simpan){
    notif("hasil sudah tersimpan");
}
function notif($pesan){
    echo'<script language ="javascript">';
    echo 'alert("'.$pesan.'")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content = "0;url = http://localhost/pramagang/randompick/">';
}
?>