<?php
require_once "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM data_testing WHERE no = '$id'";
$hasil = mysqli_query($link, $query);

header('Location: data_testing.php');
