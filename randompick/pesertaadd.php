<?php
require_once("koneksi\koneksidb.php");
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$peserta = mysqli_query($koneksidb, "INSERT INTO peserta(id, nama,alamat) values('".$id."','".$nama."','".$alamat."')");


if($peserta){
    notif("hasil sudah tersimpan");
}
function notif($pesan){
    echo'<script language ="javascript">';
    echo 'alert("'.$pesan.'")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content = "0;url = http://localhost/pramagang/randompick/">';
}
?>