<?php
/* Di file inilah dilakukan perhitungan pencarian pobabilitas */

class Bayes
{

  function __construct()
  {
    // koneksi ke database
    $link = mysqli_connect("localhost", "root", "", "penerimaan_murid");
  }

  /*================================================================
  FUNCTION SUM TRUE DAN FALSE
  =================================================================*/

  // Jumlah data diterima
  function sumTrue()
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $dataArray = array();
    while ($getResult = mysqli_fetch_assoc($result)) {
      $dataArray[] = $getResult; //result dijadikan array 
    }

    $t = 0;
    foreach ($dataArray as $data) {
      if ($data['keterangan'] == 1) {
        $t += 1;
      }
    }

    return $t;
  }

  // Jumlah data Tidak Diterima
  function sumFalse()
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $dataArray = array();
    while ($getResult = mysqli_fetch_assoc($result)) {
      $dataArray[] = $getResult; //result dijadikan array 
    }

    $t = 0;
    foreach ($dataArray as $data) {
      if ($data['keterangan'] == 0) {
        $t += 1;
      }
    }
    return $t;
  }

  // Jumlah Keseluruhan Data
  function sumData()
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $rowcount = mysqli_num_rows($result);
    return $rowcount;
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probNilaiUN($nilaiUN, $keterangan)
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $dataArray = array();
    while ($getResult = mysqli_fetch_assoc($result)) {
      $dataArray[] = $getResult; //result dijadikan array 
    }

    $t = 0;
    foreach ($dataArray as $data) {
      if ($data['nilai_un'] == $nilaiUN && $data['keterangan'] == $keterangan) {
        $t += 1;
      } else if ($data['nilai_un'] == $nilaiUN && $data['keterangan'] == $keterangan) {
        $t += 1;
      }
    }
    return $t;
  }


  function probNilaiTesAwal($nilaiAwal, $keterangan)
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $dataArray = array();
    while ($getResult = mysqli_fetch_assoc($result)) {
      $dataArray[] = $getResult; //result dijadikan array 
    }

    $t = 0;
    foreach ($dataArray as $data) {
      if ($data['tes_awal'] == $nilaiAwal && $data['keterangan'] == $keterangan) {
        $t += 1;
      } else if ($data['tes_awal'] == $nilaiAwal && $data['keterangan'] == $keterangan) {
        $t += 1;
      }
    }
    return $t;
  }

  function probNilaiTesAkhir($nilaiAkhir, $keterangan)
  {
    global $link;

    $query = "SELECT * FROM data_training";
    $result = mysqli_query($link, $query);

    $dataArray = array();
    while ($getResult = mysqli_fetch_assoc($result)) {
      $dataArray[] = $getResult; //result dijadikan array 
    }

    $t = 0;
    foreach ($dataArray as $data) {
      if ($data['tes_akhir'] == $nilaiAkhir && $data['keterangan'] == $keterangan) {
        $t += 1;
      } else if ($data['tes_akhir'] == $nilaiAkhir && $data['keterangan'] == $keterangan) {
        $t += 1;
      }
    }
    return $t;
  }
  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data latih ( sumData )
  $pNilaiUN   : jumlah probabilitas nilai un ( probNilaiUN )
  $pNilaiAwal   : jumlah probabilitas nilai awal ( probNilaiTesAwal )
  $pNilaiAkhir  : jumlah probabilitas nilai akhir ( probNilaiAkhir )

  ==================================================================*/

  // Probabilitas X Diterima Cara 1
  function hasilTrue($sT = 0, $sD = 0, $pNilaiUN = 0, $pNilaiAwal = 0, $pNilaiAkhir = 0)
  {
    $paTrue = $sT / $sD;
    $p1 = $pNilaiUN / $sT;
    $p2 = $pNilaiAwal / $sT;
    $p3 = $pNilaiAkhir / $sT;
    $hsl = round($paTrue * $p1 * $p2 * $p3, 4);
    return $hsl;
  }

  // Probabilitas X Tidak Diterima Cara 1
  function hasilFalse($sF = 0, $sD = 0, $pNilaiUN = 0, $pNilaiAwal = 0, $pNilaiAkhir = 0)
  {
    $paFalse = $sF / $sD;
    $p1 = $pNilaiUN / $sF;
    $p2 = $pNilaiAwal / $sF;
    $p3 = $pNilaiAkhir / $sF;
    $hsl = round($paFalse * $p1 * $p2 * $p3, 4);
    return $hsl;
  }

  //  Probabilitas X Diterima Cara 2
  function hasilTrue2($sT = 0, $pNilaiUN = 0, $pNilaiAwal = 0, $pNilaiAkhir = 0)
  {
    $p1 = $pNilaiUN / $sT;
    $p2 = $pNilaiAwal / $sT;
    $p3 = $pNilaiAkhir / $sT;
    $hsl = round($p1 * $p2 * $p3, 4);
    return $hsl;
  }

  // Probabilitas X Tidak Diterima Cara 2
  function hasilFalse2($sF = 0, $pNilaiUN = 0, $pNilaiAwal = 0, $pNilaiAkhir = 0)
  {
    $p1 = $pNilaiUN / $sF;
    $p2 = $pNilaiAwal / $sF;
    $p3 = $pNilaiAkhir / $sF;
    $hsl = round($p1 * $p2 * $p3, 4);
    return $hsl;
  }

  // membandingkan nilai untuk mengecek mana yg lebih besar
  function perbandingan($pATrue, $pAFalse)
  {
    if ($pATrue > $pAFalse) {
      $keterangan = "Diterima";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $diterima = 100 - $hitung;
    } elseif ($pAFalse > $pATrue) {
      $keterangan = "Tidak Diterima";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $diterima = 100 - $hitung;
    }

    $hsl = array($keterangan, $hitung, $diterima);
    return $hsl;
  }
  //=================================================================
}
