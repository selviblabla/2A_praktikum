<?php
session_start();
require "koneksi.php";
if (empty($_SESSION['username'])) {
    echo '<script>window.location="sign-in";</script>';
} else {
    $hasil = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username]'");
    $row = mysqli_fetch_array($hasil);
    echo $row['level'];
}
