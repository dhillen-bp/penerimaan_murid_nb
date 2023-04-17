<?php
require_once 'bayes.php';
require_once 'koneksi.php';
$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['nilaiUN'];
$a2 = $_POST['nilaiAwal'];
$a3 = $_POST['nilaiAkhir'];

if ($a1 == "A") {
  $a1 = "Sangat Baik";
} else if ($a1 == "B") {
  $a1 = "Baik";
} else if ($a1 == "C") {
  $a1 = "Sedang";
} else if ($a1 == "D") {
  $a1 = "Cukup";
} else if ($a1 == "E") {
  $a1 = "Kurang";
}

if ($a2 == "A") {
  $a2 = "Sangat Baik";
} else if ($a2 == "B") {
  $a2 = "Baik";
} else if ($a2 == "C") {
  $a2 = "Sedang";
} else if ($a2 == "D") {
  $a2 = "Cukup";
} else if ($a2 == "E") {
  $a2 = "Kurang";
}

if ($a3 == "A") {
  $a3 = "Sangat Baik";
} else if ($a3 == "B") {
  $a3 = "Baik";
} else if ($a3 == "C") {
  $a3 = "Sedang";
} else if ($a3 == "D") {
  $a3 = "Cukup";
} else if ($a3 == "E") {
  $a3 = "Kurang";
}

//TRUE
$nilaiUN = $obj->probNilaiUN($a1, 1);
$nilaiAwal = $obj->probNilaiTesAwal($a2, 1);
$nilaiAkhir = $obj->probNilaiTesAkhir($a3, 1);

//FALSE
$nilaiUN2 = $obj->probNilaiUN($a1, 0);
$nilaiAkhir2 = $obj->probNilaiTesAwal($a2, 0);
$nilaiAwal2 = $obj->probNilaiTesAkhir($a3, 0);

//result
$paT = $obj->hasilTrue($jumTrue, $jumData, $nilaiUN, $nilaiAwal, $nilaiAkhir);
$paF = $obj->hasilFalse($jumFalse, $jumData, $nilaiUN2, $nilaiAwal2, $nilaiAkhir2);

//result2
$paT2 = $obj->hasilTrue2($jumTrue, $nilaiUN, $nilaiAwal, $nilaiAkhir);
$paF2 = $obj->hasilFalse2($jumFalse, $nilaiUN2, $nilaiAwal2, $nilaiAkhir2);

echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan masukan calon siswa menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#17a2b8;color:#fff'>
    <b>Informasi Data Penerimaan Siswa Baru</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>Nilai UN : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>Nilai Awal : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>Nilai Akhir : &nbsp;&nbsp;<b>$a3</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Nilai UN</td>
    <td>$nilaiUN / $jumTrue</td>
    <td>$nilaiUN2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Nilai Awal</td>
    <td>$nilaiAwal / $jumTrue</td>
    <td>$nilaiAwal2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Nilai Akhir</td>
    <td>$nilaiAkhir / $jumTrue</td>
    <td>$nilaiAkhir2 / $jumFalse</td>
  </tr>
</table>
";
$hsl_paT2 = round($paT2 / ($paT2 + $paF2), 4);
$hsl_paF2 = round($paF2 / ($paF2 + $paT2), 4);
echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#17a2b8;color:#fff'>
      <th class='bg-success'>Probabilitas Diterima</th>
      <th class='bg-danger'>Probabilitas Tidak Diterima</th>
      <th class='bg-success text-muted'>Probabilitas Diterima Cara 2</th>
      <th class='bg-danger text-muted'>Probabilitas Tidak Diterima Cara 2</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
      <td>$hsl_paT2</td>
      <td>$hsl_paF2</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT, $paF);

if ($paT > $paF) {
  echo "<br>
  <h3 class='tebal'>PROBABILITAS <span class='badge badge-success' style='padding:10px'><b>Diterima</b></span> LEBIH BESAR DARI PADA PROBABILITAS Tidak</h3><br>";
  echo "<h4><br>Persentase Diterima sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Persentase Tidak Diterima sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
} else if ($paF > $paT) {
  echo "<br>
  <h3 class='tebal'>PERSENTASE <span class='badge badge-danger' style='padding:10px'><b>Tidak Direrima</b></span> LEBIH BESAR DARI PADA PERSENTASE Ya</h3><br>";
  echo "<h4><br>Persentase Tidak Diterima sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Persentase Diterima sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
}


if ($result[0] == "Diterima") {
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Selamat! berdasarkan hasil prediksi , Anda dinyatakan <b>Diterima!</b></p>
    <hr>
    <p class='mb-0'>- GGWP -</p>
  </div>";
} else {
  echo "
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Maaf, berdasarkan hasil prediksi , anda dinyatakan <b>Tidak Diterima!</p>
  <hr>
  <p class='mb-0'>- NT LAGI NT LAGI ! -</p>
  </div>";
}

?>

<form action="tambah_data_testing.php" method="post">
  <label for="nama">Masukkan Nama</label>
  <input type="text" name="nama" id="nama">
  <input type="hidden" name="a1" value="<?= $a1; ?>">
  <input type="hidden" name="a2" value="<?= $a2; ?>">
  <input type="hidden" name="a3" value="<?= $a3; ?>">
  <input type="hidden" name="keterangan" value="<?= $result[0]; ?>">
  <input type="hidden" name="persen" value="<?= round($result[1], 2); ?>">
  <button type='submit' name='tambahDt' class='btn btn-primary'>Tambahkan Data</button>
</form>