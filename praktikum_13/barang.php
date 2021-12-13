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
                                    
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($query = mysqli_fetch_array($select)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $query['kode_barang'] ?></td>
                                        <td><?= $query['nama_barang'] ?></td>
                                        <td><img src="<?= "images/". $query['gambar'] . ".jpg"; ?>" width="120" height="100" class="rounded" alt="..."></td>
                                        <td><?= $query['keterangan'] ?></td>
                                        <td><?= $query['stock'] ?></td>
                                        <td>
                                            
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $no ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $no ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                </svg></button></th>

                                        </td>
                                    </tr>
                                    <!-- Modal Gambar -->
                                    <div class="modal fade" id="examplemodal<?php echo $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Gambar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo $query["gambar"] ?>" class="img-fluid" alt="...">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Gambar -->
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="modaledit<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-Ig">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="proses/proses_edit_data_barang.php" method="POST">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="kode_barang" class="col-form-label">Kode Barang:</label>
                                                            <input type="number" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $query['kode_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $query['nama_barang'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="col-form-label">Keterangan:</label>
                                                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $query['keterangan'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stock" class="col-form-label">Stock:</label>
                                                            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $query['stock'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="gambar" class="col-form-label">Gambar:</label>
                                                            <input type="text" class="form-control" id="gambar" name="gambar" value="<?php echo $query['gambar'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Edit-->
                                    <!-- MODAL DELET -->
                                    <div class="modal fade" id="modaldelete<?php echo $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-Ig">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda Ingin Menghapus Data ? <?= $query["nama_barang"]; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="delete.php?kode_barang=<?= $query['kode_barang'] ?>" type="button" class="btn btn-primary">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- AKHIR MODAL DELET -->
                                <?php } ?>
                                <!-- Modal Tambah -->
                                <div class="modal fade" id="exampletambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_tambah_data_barang.php" method="POST">
                                                    <div class="mb-1">
                                                        <label for="kode_barang" class="col-form-label">kode barang:</label>
                                                        <input type="text" name="kode_barang" class="form-control" id="kode_barang">
                                                    </div>
                                                    <div class="mb-1">
       
                                                    <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                                        <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="keterangan" class="col-form-label">Keterangan Barang:</label>
                                                        <input type="text" name="keterangan" class="form-control" id="keterangan">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="stock" class="col-form-label">Stok Barang:</label>
                                                        <input type="text" name="stock" class="form-control" id="stock">
                                                    </div>
                                                    <div class="mb-1">
                                                        <label for="gambar" class="col-form-label">Gambar Barang:</label>
                                                        <input type="text" name="gambar" class="form-control" id="gambar">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Tambah -->
                            </tbody>
                        </table>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampletambahdata" class="btn btn-primary">Tambah</button>

                    </div>
                </div>
            </div>
            <!-- akhir isi konten -->
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>