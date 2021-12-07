<html>
    <head>
    <title>koneksi Database MySQL</title>
</head>
<body>
    <h1>Demo koneksi database MySQL</h1>
    <?php
    $conn=mysqli_connect ("localhost","root","");
    if  ($conn) {
          echo "server terkoneksi";
      } else {
          echo "server tidak terkoneksi";
      }
?>
</body>
</html>