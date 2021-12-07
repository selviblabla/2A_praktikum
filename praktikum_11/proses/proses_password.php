<?php
if (isset($_POST['simpan'])) {
    require "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $hasil = mysqli_fetch_array($sql);

    if ($password == $hasil['password']) {
        echo '<script>alert("Password baru yang anda masukkan sama dengan password lama, mohon masukkan password yang berbeda");</script>';
        echo '<script>window.location="../setting.php";</script>';
    } else {
        if ($hasil['username'] == $username) {
            $update = mysqli_query($conn, "UPDATE tb_user SET password = '$password' WHERE username = '$username'");
        }

        if ($update) {
            echo '<script>alert("Penggantian password berhasil");</script>';
            echo '<script>window.location="../setting.php";</script>';
        } else {
            echo '<script>alert("Pengantian password gagal, mohon kontak admin");</script>';
            echo '<script>window.location="../setting.php";</script>';
        }
    }
} else {
    header("location: ../setting.php");
}
