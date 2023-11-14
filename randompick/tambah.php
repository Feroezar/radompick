<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<?php
    require_once("koneksi\koneksidb.php");
    $qproduk = mysqli_query($koneksidb, "SELECT * FROM peserta");
    ///MBA2023001 : MBA (keterangan), 2023(tahun sekarang), 001 (no urut)
    $query_cekkode = mysqli_query($koneksidb,
    "select id from peserta ORDER BY id DESC LIMIT 0,1");
    $cekkode = mysqli_fetch_array($query_cekkode);	
    if($cekkode !==  null){
        $min=100;
        $max=999;
        $minmax = rand($min,$max);
        
        $min1= 0;
        $max1 = 3;
        $test = rand($min1,$max1);
        $a=array("BA","UD","AP","OS");
        $random_keys=array_rand($a,4);
        $text = $a[$random_keys[$test]];

    }	
    else{
        //ini jika belum ada data yang terinput a
        $th_sekarang = date("Y");
        $nourut_baru =  "001";
    }
    $kodeterbaru = $text.$minmax;
?>
    <center style="margin-top: 20px;">
        <h1>Tambahkan Peserta</h1>
    </center>
    <center style="margin-top: 100px;">
        <form action="pesertaadd.php" method="post" enctype="multipart/form-data">
            <div class="col-md">
                <label for="">Id :</label>
                <input type="text" name="id" readonly value="<?php echo $kodeterbaru; ?>">
                <input type="hidden" name="detail" readonly value="<?php echo $kodedetail; ?>">
            </div>
            <div class="col-md" style="margin-top: 20px;">
                <label for="tx_tgl">Nama : </label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="col-md" style="margin-top: 20px;">
                <label for="tx_tgl">Alamat : </label>
                <textarea type="" name="alamat" id="nama"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </center>
</body>
</html>
