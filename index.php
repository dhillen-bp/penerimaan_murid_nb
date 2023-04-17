<?php
include_once "templates/header.php";
include_once "templates/sidebar.php";

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Naive Bayes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Naive Bayes:</h5>
                        <p class="text-justify">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes. Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes, yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes. Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yang sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian. Menurut Olson Delen (2008) menjelaskan Naïve Bayes untuk setiap kelas keputusan, menghitung probabilitas dg syarat bahwa kelas keputusan adalah benar, mengingat vektor informasi obyek. Algoritma ini mengasumsikan bahwa atribut obyek adalah independen. Probabilitas yang terlibat dalam memproduksi perkiraan akhir dihitung sebagai jumlah frekuensi dari " master " tabel keputusan.</p>
                        <p>Berdasarkan latar belakang pada studi kasus, penerapan sistem pendukung keputusan dengan menggunakan metode Naive Bayes dapat menjadi solusi dengan memprediksi nilai probabilitas. menggunakan nilai-nilai yang dimasukkan, berupa kriteria-kriteria yang dibutuhkan yaitu nilai hasil ujian nasional dan nilai tes dari beberapa bidang studi. Penyeleksian dapat lebih optimal dan waktu yang diperlukan untuk menyusun serta mengevaluasi penyeleksian calon peserta didik baru menjadi lebih efisien.</p>
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Simulasi Penerimaan Peserta Didik Baru
                                </h4>
                            </div>
                            <!-- /.col -->
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="nilaiUN">Nilai UN</label>
                                                <select class="form-control select2" style="width: 100%; " name="nilaiUN" id="nilaiUN" required="required">
                                                    <option value="" disabled selected>--Pilih--</option>
                                                    <option value="A">Sangat Baik (5.00 - 5.50)</option>
                                                    <option value="B">Baik (4.00 - 4.99</option>
                                                    <option value="C">Sedang (3.00 - 3.99)</option>
                                                    <option value="D">Cukup (2.00 - 2.99)</option>
                                                    <option value="E">Kurang (0.00 - 1.99)</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="tes_awal">Nilai Tes Tahap Awal</label>
                                                <select class="form-control select2" style="width: 100%; " name="nilaiAwal" id="nilaiAwal" required="required">
                                                    <option value="" disabled selected>--Pilih--</option>
                                                    <option value="A">Sangat Baik (80 - 100)</option>
                                                    <option value="B">Baik (70 - 79</option>
                                                    <option value="C">Sedang (60 - 69)</option>
                                                    <option value="D">Cukup (50 - 59)</option>
                                                    <option value="E">Kurang (0 - 49)</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="tes_akhir">Nilai Tes Tahap Akhir</label>
                                                <select class="form-control select2" style="width: 100%; " name="nilaiAkhir" id="nilaiAkhir" required="required">
                                                    <option value="" disabled selected>--Pilih--</option>
                                                    <option value="A">Sangat Baik (80 - 100)</option>
                                                    <option value="B">Baik (70 - 79</option>
                                                    <option value="C">Sedang (60 - 69)</option>
                                                    <option value="D">Cukup (50 - 59)</option>
                                                    <option value="E">Kurang (0 - 49)</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()" />
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>

                        <!-- Kosongan Untuk ajax -->
                        <div class="row">
                            <div class="col-12 mt-5 mb-5">
                                <div id="hasilSIM" style="margin-bottom:30px;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "templates/footer.php";
?>

<!-- validasi -->
<script>
    $(document).ready(function() {
        $('.toggle').click(function() {
            $('ul').toggleClass('active');
        });
    });
</script>

<script>
    function simulasi() {
        var nilaiUN = $("#nilaiUN").val();
        var nilaiAwal = $("#nilaiAwal").val();
        var nilaiAkhir = $("#nilaiAkhir").val();

        //validasi
        var un = document.getElementById("nilaiUN");
        var nAwal = document.getElementById("nilaiAwal");
        var nAkhir = document.getElementById("nilaiAkhir");

        if (un.selectedIndex == 0) {
            alert("Nilai UN Tidak Boleh Kosong");
            return false;
        }

        if (nAwal.selectedIndex == 0) {
            alert("Nilai Tes Awal Tidak Boleh Kosong");
            return false;
        }

        if (nAkhir.selectedIndex == 0) {
            alert("Nilai Tes Akhir Tidak Boleh Kosong");
            return false;
        }

        //batas validasi

        $.ajax({
            url: 'simulasi.php',
            type: 'POST',
            dataType: 'html',
            data: {
                nilaiUN: nilaiUN,
                nilaiAwal: nilaiAwal,
                nilaiAkhir: nilaiAkhir,
            },
            success: function(data) {
                document.getElementById("hasilSIM").innerHTML = data;
            },
        });

        return false;

    }
</script>

<script>
    $(document).ready(function() {
        $('#dor').click(function() {
            $('html, body').animate({
                scrollTop: $("#hasilSIM").offset().top
            }, 500);
        });
    });
</script>