<?php
session_start();
include 'config/config.php';

$queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id DESC");
//delete query
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];


    $delete = mysqli_query($koneksi, "UPDATE jurusan SET deleted = 1 WHERE id='$id'");
}

// query update
if (isset($_POST['ubah_pilihan'])) {
    $pilihan = $_POST['pilihan'];
    $id = $_POST['id'];

    // ubah jurusan kolom pilihan dimana id sama dengan nilai post id
    $ubahPilihan = mysqli_query($koneksi, "UPDATE jurusan SET pilihan='$pilihan' WHERE id='$id'");
    header("location:jurusan.php?ubah-status=berhasil");
}
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Peserta Pelatihan</title>
    <link href="assets/tema/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'inc/navbar.php'; ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Pendaftaran Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="peserta_pelatihan.php">Peserta Pelatihan</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDataPilihanPelatihan" aria-expanded="false" aria-controls="collapseDataPilihanPelatihan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data Pilihan Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataPilihanPelatihan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="user.php">Data Pengguna</a>
                                <a class="nav-link" href="jurusan.php">Data Jurusan</a>
                                <a class="nav-link" href="level.php">Data Level</a>
                                <a class="nav-link" href="gelombang.php">Data Gelombang</a>
                            </nav>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Sistem Informasi Pendaftaran
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Jurusan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="jurusan.php">Data Jurusan</a></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div align="right">
                                <a href="tambah-jurusan.php" class="btn btn-primary mb-4">Tambah Jurusan</a>
                            </div>
                            <div class=" table - responsive">
                                <table class="table table-bordered" id=" datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dataJurusan['nama_jurusan'] ?></td>
                                                <td>
                                                    <a href="tambah-jurusan.php?edit=<?php echo $dataJurusan['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" href="tambah-jurusan.php?delete=<?php echo $dataJurusan['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'inc/footer.php'; ?>
        </div>
    </div>
    <?php include 'inc/js.php'; ?>
</body>

</html>