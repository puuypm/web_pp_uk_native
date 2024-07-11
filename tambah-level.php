<?php
session_start();
include 'config/config.php';

// Jika button disubmit, ambil nilai dari nama_level
if (isset($_POST['simpan'])) {
    $nama_level = $_POST['nama_level'];

    // masukkan ke dalam table levels dimana kolom nama di ambil nilainya dari inputan nama
    $insertLevel = mysqli_query($koneksi, "INSERT INTO levels (nama_level) VALUES('$nama_level')");
    header("location:level.php?notif=tambah-success");
}

// Jika parameter delete ada, buat perintah/query delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id='$id'");
    header('location:level.php?notif=delete-success');
}

// Tampilkan semua data dari tabel levels dimana id nya diambil dari parameter edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $queryEdit = mysqli_query($koneksi, "SELECT * FROM levels WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];

    $id = $_GET['edit'];

    // Ubah data dari table levels dimana nilai nama diambil dari inputan nama
    // dan nilai id levelnya diambil dari parameter

    $edit = mysqli_query($koneksi, "UPDATE levels SET nama_level='$nama_level' WHERE id='$id'");
    header('location:level.php?notif=edit-success');
}
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
                    <h1 class="mt-4">Data Level</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="level.php">Data Level</a></li>
                        <?php if (isset($_GET['edit'])) { ?>
                            <li class="breadcrumb-item"><a href="level.php">Edit Level</a></li>
                        <?php } else { ?>
                            <li class="breadcrumb-item"><a href="tambah-level.php">Tambah Level</a></li>
                        <?php } ?>
                    </ol>
                    <div class="card mb-4">
                        <?php if (isset($_GET['edit'])) { ?>
                            <div class="card">
                                <div class="card-header">Edit Level</div>
                                <div class="card-body">
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="">Level</label>
                                            <select name="nama_level" id="" class="form-control">
                                                <option value="">-- Pilih Jurusan --</option>
                                                <option <?php echo ($dataEdit['nama_level'] == 1) ? 'selected' : '' ?> value="Admin Pelatihan">Admin Pelatihan</option>
                                                <option <?php echo ($dataEdit['nama_level'] == 2) ? 'selected' : '' ?> value="Administrator">Administrator</option>
                                                <option <?php echo ($dataEdit['nama_level'] == 0) ? 'selected' : '' ?> value="Peserta">Peserta</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                            <a href="level.php" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card">
                                <div class="card-header">Tambah Level</div>
                                <div class="card-body">
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="">Level</label>
                                            <select name="nama_level" id="" class="form-control">
                                                <option value="">-- Pilih Level --</option>
                                                <option value="Admin Pelatihan">Admin Pelatihan</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Peserta">Peserta</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                            <a href="level.php" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </main>
            <?php include 'inc/footer.php'; ?>
        </div>
    </div>
    <?php include 'inc/js.php'; ?>
</body>

</html>