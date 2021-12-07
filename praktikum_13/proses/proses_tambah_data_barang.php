<?php
require "koneksi.php";
$kd_brg     =$POST['kd_brg'];
$na_brg     =$POST['na_brg'];
$ket_brg    =$POST['ket_brg'];
$stok_brg   =$POST['stok'];

if(empty($kd_brg) ||$kd_brg == ""){
    echo"<script>alert('data tidak boleh kosong')</script";
    echo"<script>window.location='../barang';</script>";
}else{
    $select = mysqli_query($conn, "select kode_barang FROM tb_barang  WHERE kose _barang ='$kd_brg'")
    ;
    $hasil = mysqli_fetch_array($select);
    if (isset($hsil['kode_barang'])){
        echo "<script>alert('data kode barang telah ada')</script>";
        echo "<script>window.location='../barang';</script>";
    }else{
        $sql    =mysqli_query $conn, "INSERT INTO tb_barang(kode_barang,nama_barang,keterangan,"
    }
}
   