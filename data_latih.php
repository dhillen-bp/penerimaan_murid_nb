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
                    <h1>Data Training</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Training</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p>Data Training atau Data Latih adalah data yang sudah ada sebelumnya berdasarkan fakta yang sudah terjadi (predifned class). Data training adalah data yang nantinya dapat digunakan seperlu melatih algoritma guna mencari model yang pas.</p>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nilai UN</th>
                                        <th>Nilai Tahap Awal</th>
                                        <th>Nilai Tahap Akhir</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM data_training";
                                    $result = mysqli_query($link, $query);

                                    $dataArray = array();
                                    while ($getResult = mysqli_fetch_assoc($result)) {
                                        $dataArray[] = $getResult; //result dijadikan array 
                                    }

                                    $no = 1;
                                    foreach ($dataArray as $data) :

                                        if ($data['keterangan'] == 1) {
                                            $keterangan = "Diterima";
                                        } else {
                                            $keterangan = "Tidak Diterima";
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?php echo $data['nilai_un']; ?></td>
                                            <td><?php echo $data['tes_awal']; ?></td>
                                            <td><?php echo $data['tes_akhir']; ?></td>
                                            <td><?php
                                                if ($keterangan == "Diterima") {
                                                    echo "<button class='btn btn-sm btn-success'> <b>Diterima</b> </button>";
                                                } else {
                                                    echo "<button class='btn btn-sm btn-danger'> <b>Tidak Diterima</b> </button>";
                                                }
                                                ?></td>
                                        </tr>

                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "templates/footer.php";
?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>