<?php
include_once 'koneksi.php';

$id = $_GET['id'];

$sql_check = "SELECT gambar FROM data_barang WHERE id_barang = '{$id}'";
$result_check = mysqli_query($conn, $sql_check);
$data_check = mysqli_fetch_array($result_check);
$gambar_file = $data_check['gambar'];

$sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);

if ($result && !empty($gambar_file)) {
    $filepath = dirname(__FILE__) . '/gambar/' . $gambar_file;
    if (file_exists($filepath)) {
        unlink($filepath);
    }
}

header('location: index.php');
?>