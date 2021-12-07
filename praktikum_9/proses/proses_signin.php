<?php
require "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

echo $username . "-" . $password;

$hasil = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");
$row = mysqli_fetch_array($hasil);
if ($hasil) {
    if (isset($row['username']) && isset($row['password']) && $row['username'] == $username && $row['password'] == $password) {
        echo "username ada";
    } else {
        echo '<script>alert("Mohon maaf username atau password yang anda masukkan salah");</script>';
    }
}

// echo "id adalah " . $row['id'] . "<br>";
// echo "username adalah " . $row['username'] . "<br>";
// echo "password adalah " . $row['password'] . "<br>";
// echo "level adalah " . $row['level'] . "<br>";
// echo "password adalah " . $row['password'] . "<br>";