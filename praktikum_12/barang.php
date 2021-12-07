<?php
require "proses/session.php";
require "proses/koneksi.php";

$select = mysqli_query($conn, "SELECT * FROM tb_barang");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebars.css" rel="stylesheet">

    <title>SIPBAR - Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid bg-light">

        <!-- Navbar header -->
        <?php require "header.php"; ?>
        <!-- akhir header -->
    </div>

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-3">
                <!-- sidebar -->
                <?php require "sidebar.php"; ?>
                <!-- akhir sidebar -->
            </div>

            <!-- isi konten -->
            <div class="col-9">
                <div class="card">
                    <h5 class="card-header">Data Barang</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($query = mysqli_fetch_array($select)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $query['id']; ?></th>
                                        <td><img src="<?= "images/". $query['gambar'] . ".jpg"; ?>" width="120" height="100" class="rounded" alt="..."></td>
                                        <td><?= $query['nama_barang'] ?></td>
                                        <td><?= $query['keterangan'] ?></td>
                                        <td>
                                    <button type="button" class="btn btn-Success" name="edit" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $query['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
</svg>
                                            </button>
                                    <button type="button" class="btn btn-Primary" name="delete" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $query['id']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">
  <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
  <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>
</svg>
                                            </button>
                                            <!-- modal edit -->
                                            <div class="modal fade" id="ModalEdit<?= $query['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="proses/proses_edit_barang.php" method="POST">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="nama_barang" id="floatingInput" value="<?= $query['nama_barang'] ?>" autofocus>
                                                                    <label for="floatingInput">Nama Barang</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="keterangan" id="floatingPassword" value="<?= $query['keterangan'] ?>">
                                                                    <label for="floatingPassword">Keterangan</label>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control" id="inputGroupFile02" name="gambar" value="<?= $query['gambar'] ?>">
                                                                    <label class="input-group-text" for="inputGroupFile02">Ambil</label>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- akhir modal edit -->

                                            <!-- modal Delete -->
                                            <div class="modal fade" id="ModalDelete<?= $query['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="proses/proses_hapus_barang.php" method="POST">
                                                                <p style="color: red;">Apakah anda yakin untuk menghapus barang "<?= $query['nama_barang']; ?>" ?</p>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <!-- <input type="submit" class="btn btn-primary" name="hapus" value="DELETE"> -->
                                                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal"><a href="proses/proses_hapus_barang.php?id=<?= $query['id'] ?>">Delete</a>
                                                                </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- akhir modal hapus -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- akhir isi konten -->
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>