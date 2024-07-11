<?php
session_start();
include 'config/config.php';

function getStatusPeserta($koneksi, $status)
{
    $array_status = [1];
    if (!in_array($status, $array_status)) {
        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE status $status");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE status ='$status'");
    }

    $array_status = mysqli_num_rows($query);
    return $array_status;
}

$queryPeserta = mysqli_query($koneksi, "SELECT jurusan.nama_jurusan, peserta_pelatihan.* FROM peserta_pelatihan LEFT JOIN jurusan ON jurusan.id = peserta_pelatihan.id_jurusan ORDER BY peserta_pelatihan.id DESC");

function customStatus($status)
{
    if ($status == 1) {
        $pesan = "Peserta Yang Lulus";
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDataPendaftaranPelatihan" aria-expanded="false" aria-controls="collapseDataPendaftaranPelatihan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Pendaftaran Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDataPendaftaranPelatihan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
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

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Peserta Lulus
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