<?php 
require_once("koneksi\koneksidb.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Random Number Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
<body>    
    <!-- <span>Min</span> 
    <input type="number" id = "min"> 
    <br>
    <span>Max</span> 
    <input type="number" id = "max"> 
    <br>
    <button type="button" id = "random">Random</button>
    <button type="submit" onClick="refreshPage()">Reset</button>
    <h2 id = "selectednumber"></h2>
    <span>History : </span>
    <div name="hasil" id = "history"></div> -->
  <button type="submit" onClick="refreshPage()" style="margin-top: 40px;" class="btn btn-primary center position-absolute start-50 translate-middle">ambil data</button><br>
    <?php
        $no = 1;
        $random = mysqli_query($koneksidb, "SELECT * From peserta order by rand() LIMIT 3");
        $data = mysqli_fetch_array($random);
        $das = mysqli_fetch_array($random);
        $d = mysqli_fetch_array($random);
    ?>
    <Center style="margin-top: 50px;">
    <h2><span id="a"></span>
    <span id="b"></span>
    <span id="c"></span></br></h2>
    </Center>

    <h2>Data Peserta</h2>
    <a href="tambah.php" class="btn btn-secondary" style="margin-bottom: 10px;">Tambah Peserta</a>
    <table class="table" border="1" cellpading="10">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <?php
        $no = 1;
        $isinya = mysqli_query($koneksidb, "SELECT * From peserta");
        while($tampil = mysqli_fetch_array($isinya)){
    ?>
      <tbody>
        <tr>
          <td><?= $tampil['id']?></td>
          <td><?= $tampil['Nama']?></td>
          <td><?= $tampil['Alamat']?></td>
        </tr>
      </tbody>
      <?php }?>
    </table>
  <P><h2>Hasil Tabel yang didapatkan</h2></P>
  <form action="prosesadd.php" method="post" enctype="multipart/form-data">
    <table class="table" border="1" cellpading="10">
      <thead>
        <tr>
          <th>Hasil Acak</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      
      <tbody>
        <tr>
          <td><input id="hilang" type="text" name="hasil" value="" readonly></td>
          <td><input id="d" type="text" name="nama" value="" readonly></td>
          <td><input id="e" type="text" name="alamat" value="" readonly></td>
          <td><input type="text" name="ket"></td>
        </tr>
        <tr>
          <td><input id="f" type="text" name="hasilku" value="" readonly></td>
          <td><input id="g" type="text" name="namaku" value="" readonly></td>
          <td><input id="h" type="text" name="alamatku" value="" readonly></td>
          <td><input type="text" name="keterangan"></td>
        </tr>
        <tr>
          <td><input id="i" type="text" name="hasilnya" value="" readonly></td>
          <td><input id="j" type="text" name="namanya" value="" readonly></td>
          <td><input id="k" type="text" name="alamatnya" value="" readonly></td>
          <td><input type="text" name="keter"></td>
        </tr>
      </tbody>
    </table>
    <button type="submit">Simpan Data</button>
</form>
    <script type="text/javascript">
      function refreshPage(){
        var timeleft1 = 3;
        var downloadTimer1 = setInterval(function(){
        if(timeleft1 <= 0){
          clearInterval(downloadTimer1);
          document.getElementById("a").innerHTML = "<?= $data['id']?>";

          document.getElementById("hilang").value = "<?=$data["id"]?>";
          document.getElementById("d").value = "<?= $data['Nama']?>";
          document.getElementById("e").value = "<?= $data['Alamat']?>";

        } else {
          document.getElementById("a").innerHTML = "<h5>"+timeleft1+"</h5>";
        }
        timeleft1 -= 1;
        }, 1000);

        var timeleft2 = 5;
        var downloadTimer2 = setInterval(function(){
        if(timeleft2 <= 0){
          clearInterval(downloadTimer2);

          document.getElementById("b").innerHTML = "<?= $das['id']?>";

          document.getElementById("f").value = "<?=$das["id"]?>";
          document.getElementById("g").value = "<?= $das['Nama']?>";
          document.getElementById("h").value = "<?= $das['Alamat']?>";

        } else {
          document.getElementById("b").innerHTML = "<h5>"+timeleft2+"</h5>";
        }
        timeleft2 -= 1;
        }, 1000);

        var timeleft3 = 8;
        var downloadTimer3 = setInterval(function(){
        if(timeleft3 <= 0){
          clearInterval(downloadTimer3);
          document.getElementById("c").innerHTML = "<?= $d['id']?>";

          document.getElementById("i").value = "<?=$d["id"]?>";
          document.getElementById("j").value = "<?= $d['Nama']?>";
          document.getElementById("k").value = "<?= $d['Alamat']?>";
        } else {
          document.getElementById("c").innerHTML = "<h5>"+timeleft3+"</h5>";
        }
        timeleft3 -= 1;
        }, 1000);
        // window.location.reload();
      } 
      document.getElementById('random').onclick = function(){
        var min = Math.ceil(document.getElementById('min').value);
        var max = Math.floor(document.getElementById('max').value);

        random(min, max);
      };

      const history = [];
      function random(min, max){
        var randomnumber = Math.floor(Math.random() * (max - min + 1)) + min;

        if(history.includes(randomnumber)){
          random(min, max);
        }
        else{
          document.getElementById("selectednumber").innerHTML = randomnumber;
          history.push(randomnumber);

          document.getElementById("history").innerHTML = "";
          for (var i = 0; i < history.length; i++) {
            document.getElementById("history").innerHTML += history[i] + "<br>";
           }
        }
      }
    </script>
  </body>
</html>