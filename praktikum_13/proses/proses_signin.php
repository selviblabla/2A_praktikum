<?php
require "koneksi.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_user WHERE username = '$username' and password ='$password'";
$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($hasil);
if ($hasil) {
    if (isset($row['username']) && isset($row['password']) && $row['username'] == $username && $row['password'] == $password) {
        $_SESSION['username'] = $username;
        // header("refresh:0;url=../index.php");
        echo '<script>window.location="../index.php";</script>';
    } else {
        // header("refresh:0;url=../sign-in/index.php");
        echo '<script>alert("Mohon maaf username atau password yang anda masukkan salah");</script>';
        echo '<script>window.location="../sign-in";</script>';
    }
}
