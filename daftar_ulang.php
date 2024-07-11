<?php
session_start();
include 'config/config.php';

// mencari sebuah email di dalam tabel user, jika ada dapat data
// kalau tidak ada kembali ke login dengan pesan data tidak ditemukan
// $_POST[] = Variable sistem untuk
// mengambil nilai dari input dengan method post

if (isset($_POST['verifikasi'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $id_gelombang = $_POST['id_gelombang'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $kartu_keluarga = $_POST['kartu_keluarga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $kejuruan = $_POST['kejuruan'];
    $nomor_hp = $_POST['nomor_hp'];
    $email = $_POST['email'];

    $insert = mysqli_query($koneksi, "INSERT INTO peserta_pelatihan(id_jurusan, id_gelombang, nama_lengkap, nik, kartu_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nama_sekolah, kejuruan, nomor_hp, email)
        VALUES('$id_jurusan', '$id_gelombang', '$nama_lengkap', '$nik', '$kartu_keluarga', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$pendidikan_terakhir', '$nama_sekolah', '$kejuruan', '$nomor_hp', '$email')");
    if ($insert) {
        // redirect
        header("location:daftar_ulang.php?success=daftar-ulang");
    }
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
    <title>Dashboard Aplikasi Peserta Pelatihan PPKD Jakarta Pusat 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
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
                        <a class="nav-link" href="dashboard_siswa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Calon Peserta Pelatihan</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataCalonPeserta" aria-expanded="false"
                            aria-controls="collapseDataCalonPeserta">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Calon Peserta
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataCalonPeserta" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="daftar.php">Pendaftaran</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseDataCalonPeserta" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="daftar_ulang.php">Daftar Ulang</a>
                            </nav>
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
                    <h1 class="mt-4">Data Calon Peserta</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard_siswa.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="daftar_ulang.php">Daftar Ulang</a></li>
                    </ol>
                    <div class="card">
                        <div class="card-header">Daftar Ulang Kelulusan Peserta Pelatihan</div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <?php if (isset($_GET['success']) == 'daftar-ulang') : ?>
                                    <div class="alert alert-success">Terima kasih sudah melakukan daftar ulang pelatihan
                                        di PPKD Jakarta Pusat:)</div>
                                    <?php endif ?>

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar Ulang Kelulusan Peserta Pelatihan PPKD
                                            Jakarta Pusat
                                        </h1>
                                    </div>
                                    <form class="row g-3" method="post">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input name="nama_lengkap" type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">NIK</label>
                                            <input name="nik" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Kartu Keluarga</label>
                                            <input name="kartu_keluarga" type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-select" id="exampleInputPassword"
                                                aria-describedby="emailHelp" required>
                                                <option selected disabled value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input name="tanggal_lahir" type="date"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jurusan</label>
                                            <select name="id_jurusan" class="form-select" id="" required>
                                                <option selected disabled value="">-- Pilihan Jurusan --</option>
                                                <option value="1">Operator Komputer</option>
                                                <option value="2">Bahasa Inggris</option>
                                                <option value="3">Desain Grafis</option>
                                                <option value="4">Tata Boga</option>
                                                <option value="5">Tata Busana</option>
                                                <option value="6">Tata Graha</option>
                                                <option value="7">Teknik Pendingin</option>
                                                <option value="8">Teknik Komputer</option>
                                                <option value="9">Otomotif Sepeda Motor</option>
                                                <option value="10">Jaringan Komputer</option>
                                                <option value="11">Barista</option>
                                                <option value="12">Bahasa Korea</option>
                                                <option value="13">Make Up Artist</option>
                                                <option value="14">Video Editor</option>
                                                <option value="15">Content Creator</option>
                                                <option value="0">Web Programming</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Pendidikan Terakhir</label>
                                            <input name="pendidikan_terakhir" type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Nama Sekolah</label>
                                            <input name="nama_sekolah" type="text"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Kejuruan</label>
                                            <select name="kejuruan" class="form-select" id="" required>
                                                <option selected disabled value="">-- Pilihan Kejuruan --</option>
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
                                        <div class="col-md-4">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input name="nomor_hp" type="number" class="form-control form-control-user"
                                                id="exampleInputPassword" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Gelombang</label>
                                            <select name="id_gelombang" class="form-select" id="" required>
                                                <option selected disabled value="">-- Pilihan Gelombang --</option>
                                                <option value="1">Angkatan 1</option>
                                                <option value="2">Angkatan 2</option>
                                                <option value="3">Angkatan 3</option>
                                                <option value="0">Angkatan 4</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button name="daftar_ulang" class="btn btn-primary" type="submit">Daftar
                                                Ulang</button>
                                            <button onclick="window.print()" class="btn btn-primary">Print</button>
                                            <a href="dashboard_siswa.php" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
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