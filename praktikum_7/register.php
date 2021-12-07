<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="prosesregister.php" method="POST">
        <table border="0">
            <tr>
                <td>
                    <label for="">Username</label>
                </td>
                <td>
                    <input type="text" name="username" autofocus>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password</label>
                </td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Ulang Password</label>
                </td>
                <td>
                    <input type="password" name="upassword">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Tanggal Lahir</label>
                </td>
                <td>
                    <input type="date" name="tgl_lahir">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat</label>
                </td>
                <td>
                    <textarea name="alamat"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>