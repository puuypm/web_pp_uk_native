<?php
session_start();
include 'config/config.php';

//function getJurusanPeserta($koneksi, $id_jurusan)
//{
//    $array_jurusan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
//    if (!in_array($id_jurusan, $array_jurusan)) {
//        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE id_jurusan $id_jurusan AND deleted= 0");
//    } else {
//        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE id_jurusan ='$id_jurusan' AND deleted = 0");
//    }

//    $total = mysqli_num_rows($query);
//   return $total;
//}

//function getGelombangPeserta($koneksi, $id_gelombang)
//{
//    $array_gelombang = [1, 2, 3];
//    if (!in_array($id_gelombang, $array_gelombang)) {
//        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE id_gelombang $id_gelombang AND deleted= 0");
//    } else {
//        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE id_gelombang ='$id_gelombang' AND deleted = 0");
//    }

//    $total = mysqli_num_rows($query);
//    return $total;
//}

function getStatusPeserta($koneksi, $status)
{
    $array_status = [1, 2, 3];
    if (!in_array($status, $array_status)) {
        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE status $status");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE status ='$status'");
    }

    $total = mysqli_num_rows($query);
    return $total;
}

$queryPeserta = mysqli_query($koneksi, "SELECT jurusan.nama_jurusan, peserta_pelatihan.* FROM peserta_pelatihan LEFT JOIN jurusan ON jurusan.id = peserta_pelatihan.id_jurusan ORDER BY peserta_pelatihan.id DESC");

//function custom($id_jurusan)
//{
//    if ($id_jurusan == 1) {
//        $pesan = "Operator Komputer";
//    } elseif ($id_jurusan == 2) {
//        $pesan = "Bahasa Inggris";
//    } elseif ($id_jurusan == 3) {
//        $pesan = "Desain Grafis";
//    } elseif ($id_jurusan == 4) {
//        $pesan = "Tata Boga";
//    } elseif ($id_jurusan == 5) {
//        $pesan = "Tata Busana";
//    } elseif ($id_jurusan == 6) {
//        $pesan = "Tata Graha";
//    } elseif ($id_jurusan == 7) {
//        $pesan = "Teknik Pendingin";
//    } elseif ($id_jurusan == 8) {
//        $pesan = "Teknik Komputer";
//    } elseif ($id_jurusan == 9) {
//        $pesan = "Otomotif Sepeda Motor";
//    } elseif ($id_jurusan == 10) {
//        $pesan = "Jaringan Komputer";
//    } elseif ($id_jurusan == 11) {
//        $pesan = "Barista";
//    } elseif ($id_jurusan == 12) {
//        $pesan = "Bahasa Korea";
//    } elseif ($id_jurusan == 13) {
//        $pesan = "Make Up Artist";
//    } elseif ($id_jurusan == 14) {
//        $pesan = "Video Editor";
//    } elseif ($id_jurusan == 15) {
//        $pesan = "Content Creator";
//    } else {
//        $pesan = "Web Programming";
//    }

//    return $pesan;
//}

//function customGelombang($id_gelombang)
//{
//    if ($id_gelombang == 1) {
//        $pesan = "Angkatan 1";
//    } elseif ($id_gelombang == 2) {
//        $pesan = "Angkatan 2";
//    } elseif ($id_gelombang == 3) {
//        $pesan = "Angkatan 3";
//    } else {
//        $pesan = "Angkatan 4";
//    }

//    return $pesan;
//}

function customStatus($status)
{
    if ($status == 1) {
        $pesan = "Peserta Yang Lulus";
    } elseif ($status == 2) {
        $pesan = "Lulus Wawancara";
    } elseif ($status == 3) {
        $pesan = "Lulus Administrasi";
    } else {
        $pesan = "Tidak Lulus";
    }

    return $pesan;
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

<body class="sb-nav-fixed">
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataPendaftaranPelatihan" aria-expanded="false"
                            aria-controls="collapseDataPendaftaranPelatihan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Pendaftaran Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataPendaftaranPelatihan" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="peserta_pelatihan.php">Peserta Pelatihan</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseDataPilihanPelatihan" aria-expanded="false"
                            aria-controls="collapseDataPilihanPelatihan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Data Pilihan Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataPilihanPelatihan" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="user.php">Data Pengguna</a>
                                <a class="nav-link" href="jurusan.php">Data Jurusan</a>
                                <a class="nav-link" href="level.php">Data Level</a>
                                <a class="nav-link" href="gelombang.php">Data Gelombang</a>
                            </nav>
                        </div>
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
                    <h1 class="mt-4">Data Peserta Pendaftaran Pelatihan Di PPKD Jakarta Pusat </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Peserta Pendaftaran Pelatihan</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Peserta Yang Lulus</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="peserta_lulus.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Lulus Administrasi</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href=#>View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Lulus Wawancara</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href=#>View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Peserta Tidak Lulus </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href=#>View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Peserta Pelatihan
                        </div>
                        <div class="card-body">
                            <div class=" table - responsive">
                                <table class="table table-bordered" id=" datatables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Gelombang</th>
                                            <th>Nama Lengkap</th>
                                            <th>NIK</th>
                                            <th>Nomor Kartu Keluarga</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kejuruan</th>
                                            <th>Nomor Telepon</th>
                                            <th>Email</th>
                                            <th>Aktivitas Saat Ini</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        while ($data = mysqli_fetch_assoc($queryPeserta)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['id_jurusan'] ?></td>
                                            <td><?php echo $data['id_gelombang'] ?></td>
                                            <td><?php echo $data['nama_lengkap'] ?></td>
                                            <td><?php echo $data['nik'] ?></td>
                                            <td><?php echo $data['kartu_keluarga'] ?></td>
                                            <td><?php echo $data['jenis_kelamin'] ?></td>
                                            <td><?php echo $data['tempat_lahir'] ?></td>
                                            <td><?php echo $data['tanggal_lahir'] ?></td>
                                            <td><?php echo $data['pendidikan_terakhir'] ?></td>
                                            <td><?php echo $data['nama_sekolah'] ?></td>
                                            <td><?php echo $data['kejuruan'] ?></td>
                                            <td><?php echo $data['nomor_hp'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['aktivitas_saat_ini'] ?></td>
                                            <td><?php echo customStatus($data['status']) ?></td>
                                            <td>
                                                <a data-toggle="modal"
                                                    data-target="#ubahStatus-<?php echo $data['id'] ?>"
                                                    href="tambah-peserta.php?edit=editData&ids=<?= $data['id'] ?>"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                                    href="peserta_pelatihan.php?delete=<?php echo $data['id'] ?>"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php include 'modal-ubah-status-peserta.php' ?>
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