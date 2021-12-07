<html>
    <head>
        <title> koneksi Database MySQL</title>
</head>
<body>
    <h1>koneksi database dengan
mysql_fetch_assoc</h1>
<?php
$conn=mysqli_connect("localhost","root","","db_saya"
or die ("koneksi gagal");
$hasil= mysql_query($conn,"select * from liga");
    while ($row=mysqli_fetch_array($hasil)) {
        echo "liga" .$row["negara"];
        echo "mempunyai" .$row["champion"];
        echo "wakil di liga champion <br>";
    }
?>
 </body>
 </html>