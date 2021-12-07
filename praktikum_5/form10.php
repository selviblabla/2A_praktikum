<html>
    <head>
        <title>Buku Tamu</title>
</head>
<body>
    <?php
        $nma=$_POST["nama"];
        $$emil=$_POST["email"];
        $komentar=$_POST["komentar"];
    ?>
    <h1>Data Buku Tamu </h1>
    <hr>
    Nama anda : <?echo $nama?>
    <br>
    Email address : <?echo $email?>
    <br>
    komentar :
    <textarea name="komentar" cols="40"
    rows="5"><?echo $komentar?> </textarea>
    <br>
</body>
</html>