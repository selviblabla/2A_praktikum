<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Buku Tamu</title>
</head>

<body>
    <h1>Simpan Buku Tamu MySQL</h1>
    <?php
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $conn = mysqli_connect("localhost", "root", "", "db_saya") or die("Koneksi gagal");
    echo "Nama      : $nama<br>";
    echo "Email     : $email  se<br>";
    echo "Komentar  : $komentar <br>";
    $sqlstr = "INSERT INTO bukutamu VALUES ('$nama', '$email', '$komentar')";
    $hasil = mysqli_query($conn, $sqlstr);

    echo "Simpan Bukutamu berhasil dilakukan";
    ?>
</body>
</html>