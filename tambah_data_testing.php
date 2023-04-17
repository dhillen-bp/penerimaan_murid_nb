<?php
require_once 'koneksi.php';

if (isset($_POST['tambahDt'])) {
    $nama = $_POST['nama'];
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $ket = $_POST['keterangan'];
    $persen = $_POST['persen'];
    $query = "INSERT INTO data_testing (nama, nilai_un, tes_awal, tes_akhir, keterangan, persentase) VALUES ('$nama', '$a1', '$a2', '$a3', '$ket', '$persen')";

    if (mysqli_query($link, $query)) {
        header("Location: data_testing.php");
    } else {
        var_dump($query);
    }
}
