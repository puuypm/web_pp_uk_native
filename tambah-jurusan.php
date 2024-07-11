<?php
session_start();
include 'config/config.php';

// Jika button disubmit, ambil nilai dari nama_jurusan
if (isset($_POST['simpan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    // masukkan ke dalam table jurusan dimana kolom nama di ambil nilainya dari inputan nama
    $insertJurusan = mysqli_query($koneksi, "INSERT INTO jurusan (nama_jurusan) VALUES('$nama_jurusan')");
    header("location:jurusan.php?notif=tambah-success");
}

// Jika parameter delete ada, buat perintah/query delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id='$id'");
    header('location:jurusan.php?notif=delete-success');
}

// Tampilkan semua data dari tabel jurusan dimana id nya diambil dari parameter edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $queryEdit = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
}

if (isset($_POST['edit'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $id = $_GET['edit'];

    // Ubah data dari table jurusan dimana nilai nama diambil dari inputan nama
    // dan nilai id usernya diambil dari parameter

    $edit = mysqli_query($koneksi, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id='$id'");
    header('location:jurusan.php?notif=edit-success');
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
                    <h1 class="mt-4">Data Jurusan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="jurusan.php">Data Jurusan</a></li>
                        <?php if (isset($_GET['edit'])) { ?>
                            <li class="breadcrumb-item"><a href="jurusan.php">Edit Jurusan</a></li>
                        <?php } else { ?>
                            <li class="breadcrumb-item"><a href="tambah-jurusan.php">Tambah Jurusan</a></li>
                        <?php } ?>
                    </ol>
                    <div class="card mb-4">
                        <?php if (isset($_GET['edit'])) { ?>
                            <div class="card">
                                <div class="card-header">Edit Jurusan</div>
                                <div class="card-body">
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="">Jurusan</label>
                                            <select name="nama_jurusan" id="" class="form-control">
                                                <option value="">-- Pilih Jurusan --</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 1) ? 'selected' : '' ?> value="Operator Komputer">Operator Komputer</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 2) ? 'selected' : '' ?> value="Bahasa Inggris">Bahasa Inggris</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 3) ? 'selected' : '' ?> value="Desain Grafis">Desain Grafis</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 4) ? 'selected' : '' ?> value="Tata Boga">Tata Boga</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 5) ? 'selected' : '' ?> value="Tata Busana">Tata Busana</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 6) ? 'selected' : '' ?> value="Tata Graha">Tata Graha</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 7) ? 'selected' : '' ?> value="Teknik Pendingin">Teknik Pendingin</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 8) ? 'selected' : '' ?> value="Teknik Komputer">Teknik Komputer</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 9) ? 'selected' : '' ?> value="Otomotif Sepeda Motor">Otomotif Sepeda Motor</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 10) ? 'selected' : '' ?> value="Jaringan Komputer">Jaringan Komputer</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 11) ? 'selected' : '' ?> value="Barista">Barista</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 12) ? 'selected' : '' ?> value="Bahasa Korea">Bahasa Korea</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 13) ? 'selected' : '' ?> value="Make Up Artist">Make Up Artist</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 14) ? 'selected' : '' ?> value="Video Editor">Video Editor</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 15) ? 'selected' : '' ?> value="Content Creator">Content Creator</option>
                                                <option <?php echo ($dataEdit['nama_jurusan'] == 0) ? 'selected' : '' ?> value="Web Programming">Web Programming</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                            <a href="jurusan.php" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card">
                                <div class="card-header">Tambah Jurusan</div>
                                <div class="card-body">
                                    <form action="#" method="post">
                                        <div class="mb-3">
                                            <label for="">Jurusan</label>
                                            <select name="nama_jurusan" id="" class="form-control">
                                                <option value="">-- Pilih Jurusan --</option>
                                                <option value="Operator Komputer">Operator Komputer</option>
                                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                <option value="Desain Grafis">Desain Grafis</option>
                                                <option value="Tata Boga">Tata Boga</option>
                                                <option value="Tata Busana">Tata Busana</option>
                                                <option value="Tata Graha">Tata Graha</option>
                                                <option value="Teknik Pendingin">Teknik Pendingin</option>
                                                <option value="Teknik Komputer">Teknik Komputer</option>
                                                <option value="Otomotif Sepeda Motor">Otomotif Sepeda Motor</option>
                                                <option value="Jaringan Komputer">Jaringan Komputer</option>
                                                <option value="Barista">Barista</option>
                                                <option value="Bahasa Korea">Bahasa Korea</option>
                                                <option value="Make Up Artist">Make Up Artist</option>
                                                <option value="Video Editor">Video Editor</option>
                                                <option value="Content Creator">Content Creator</option>
                                                <option value="Web Programming">Web Programming</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                                            <a href="jurusan.php" class="btn btn-danger">Kembali</a>
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