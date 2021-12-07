<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
</head>

<body>
    <h1>Pendaftaran</h1>
    <?php
    $username = $_POST["username"];
    $password = $_POST["password"];
    $upassword = $_POST["upassword"];
    $nama = $_POST["nama"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $alamat = $_POST["alamat"];

    $conn = mysqli_connect("localhost", "root", "", "praktikum_7") or die("Koneksi gagal");

    if ($password != $upassword) {
        echo "Password Tidak Sama";
    } else {
        echo "Username              : $username <br>";
        echo "Password              : $password <br>";
        echo "Ulangi Password       : $upassword <br>";
        echo "Nama                  : $nama <br>";
        echo "tgl_lahir             : $tgl_lahir <br>";
        echo "Alamat                : $alamat <br>";
        $sqlstr = "INSERT INTO pengguna (username, password, nama, tgl_lahir, alamat) VALUES ('$username','$password','$nama','$tgl_lahir','$alamat')";
        $hasil = mysqli_query($conn, $sqlstr);
        echo "Pendaftaran berhasil";
    }
    ?>
</body>

</html>