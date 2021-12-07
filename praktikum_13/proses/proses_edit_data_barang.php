<?php

//include koneksi database
require "koneksi.php";

//get data dari form
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$gambar = $_POST['gambar'];
$stock   = $_POST['stock'];

$query = "INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `keterangan`, `gambar`, `stock`) 
VALUES ($kode_barang, '$nama_barang', '$keterangan', '$gambar', '$stock')";
if ($conn->query($query)) {
    header("location: ../barang");
} else {
    echo "Data Gagal Ditambahkan";
}
?>