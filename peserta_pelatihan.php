<?php
session_start();
include 'config/config.php';

$queryPeserta = mysqli_query($koneksi, "SELECT gelombang.nama_gelombang, peserta_pelatihan.* FROM peserta_pelatihan LEFT JOIN gelombang ON gelombang.id = peserta_pelatihan.id_gelombang ORDER BY peserta_pelatihan.id DESC");

//delete query
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM peserta_pelatihan WHERE id='$id'");
    header('location:peserta_pelatihan.php?notif=delete-success');
}

// ID Jurusan

function customJurusan($id_jurusan)
{
    if ($id_jurusan == 1) {
        $pesan = "Operator Komputer";
    } elseif ($id_jurusan == 2) {
        $pesan = "Bahasa Inggris";
    } elseif ($id_jurusan == 3) {
        $pesan = "Desain Grafis";
    } elseif ($id_jurusan == 4) {
        $pesan = "Tata Boga";
    } elseif ($id_jurusan == 5) {
        $pesan = "Tata Busana";
    } elseif ($id_jurusan == 6) {
        $pesan = "Tata Graha";
    } elseif ($id_jurusan == 7) {
        $pesan = "Teknik Pendingin";
    } elseif ($id_jurusan == 8) {
        $pesan = "Teknik Komputer";
    } elseif ($id_jurusan == 9) {
        $pesan = "Otomotif Sepeda Motor";
    } elseif ($id_jurusan == 10) {
        $pesan = "Jaringan Komputer";
    } elseif ($id_jurusan == 11) {
        $pesan = "Barista";
    } elseif ($id_jurusan == 12) {
        $pesan = "Bahasa Korea";
    } elseif ($id_jurusan == 13) {
        $pesan = "Make Up Artist";
    } elseif ($id_jurusan == 14) {
        $pesan = "Video Editor";
    } elseif ($id_jurusan == 15) {
        $pesan = "Content Creator";
    } else {
        $pesan = "Web Programming";
    }

    return $pesan;
}

function customJurusan2($id_jurusan)
{
    switch ($id_jurusan) {
        case '1':
            $id_jurusan = "Operator Komputer";
            break;
        case '2':
            $id_jurusan = "Bahasa Inggris";
            break;
        case '3':
            $id_jurusan = "Desain Grafis";
            break;
        case '4':
            $id_jurusan = "Tata Boga";
            break;
        case '5':
            $id_jurusan = "Tata Busana";
            break;
        case '6':
            $id_jurusan = "Tata Graha";
            break;
        case '7':
            $id_jurusan = "Teknik Pendingin";
            break;
        case '8':
            $id_jurusan = "Teknik Komputer";
            break;
        case '9':
            $id_jurusan = "Otomotif Sepeda Motor";
            break;
        case '10':
            $id_jurusan = "Jaringan Komputer";
            break;
        case '11':
            $id_jurusan = "Barista";
            break;
        case '12':
            $id_jurusan = "Bahasa Korea";
            break;
        case '13':
            $id_jurusan = "Make Up Artist";
            break;
        case '14':
            $id_jurusan = "Video Editor";
            break;
        case '15':
            $id_jurusan = "Content Creator";
            break;
        default:
            $id_jurusan = "Web Programming";
            break;
    }
    return $id_jurusan;
}

// id_gelombang

function customGelombang($id_gelombang)
{
    if ($id_gelombang == 1) {
        $pesan = "Angkatan 1";
    } elseif ($id_gelombang == 2) {
        $pesan = "Angkatan 2";
    } elseif ($id_gelombang == 3) {
        $pesan = "Angkatan 3";
    } else {
        $pesan = "Angkatan 4";
    }

    return $pesan;
}

function customGelombang2($id_gelombang)
{
    switch ($id_gelombang) {
        case '1':
            $id_gelombang = "1";
            break;
        case '2':
            $id_gelombang = "2";
            break;
        case '3':
            $id_gelombang = "3";
            break;
        default:
            $id_gelombang = "4";
            break;
    }
    return $id_gelombang;
}

// 3,2,1,0 (3: lulus administrasi, 2: lulus wawancara, 1: peserta lulus, 0: tidak lulus)
// function
// master query

function customStatus($status)
{
    if ($status == 1) {
        $pesan = "Peserta Lulus";
    } elseif ($status == 2) {
        $pesan = "Lulus Wawancara";
    } elseif ($status == 3) {
        $pesan = "Lulus Administrasi";
    } else {
        $pesan = "Tidak Lulus";
    }

    return $pesan;
}

function customStatus2($status)
{
    switch ($status) {
        case '1':
            $status = "Peserta Lulus";
            break;
        case '2':
            $status = "Lulus Wawancara";
            break;
        case '3':
            $status = "Lulus Administrasi";
            break;
        default:
            $status = "Tidak Lulus";
            break;
    }
    return $status;
}

// query update
if (isset($_POST['edit_id_jurusan'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $id = $_POST['id'];

    // ubah peserta kolom status dimana id sama dengan nilai post id
    $dataEdit = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET id_jurusan='$id_jurusan' WHERE id='$id'");
    header("location:peserta_pelatihan.php?edit-id-jurusan=berhasil");
}
// query update
if (isset($_POST['edit_id_gelombang'])) {
    $id_gelombang = $_POST['id_gelombang'];
    $id = $_POST['id'];

    // ubah peserta kolom status dimana id sama dengan nilai post id
    $dataEdit = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET id_gelombang='$id_gelombang' WHERE id='$id'");
    header("location:peserta_pelatihan.php?edit-id-gelombang=berhasil");
}
// query update
if (isset($_POST['ubah_status'])) {
    $status = $_POST['status'];
    $id = $_POST['id'];

    // ubah peserta kolom status dimana id sama dengan nilai post id
    $dataEdit = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET status='$status' WHERE id='$id'");
    header("location:peserta_pelatihan.php?edit-status=berhasil");
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseDataPendaftaranPelatihan">
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
                    <h1 class="mt-4">Data Peserta Pelatihan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="peserta_pelatihan.php">Peserta Pelatihan</a></li>
                    </ol>
                    <div class="card">
                        <div class="card-header">Peserta Pelatihan</div>
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
                                        while ($dataPeserta_pelatihan = mysqli_fetch_assoc($queryPeserta)) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['id_jurusan'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['id_gelombang'] ?>
                                                </td>
                                                <td><?php echo $dataPeserta_pelatihan['nama_lengkap'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['nik'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['kartu_keluarga'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['jenis_kelamin'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['tempat_lahir'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['tanggal_lahir'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['pendidikan_terakhir'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['nama_sekolah'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['kejuruan'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['nomor_hp'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['email'] ?></td>
                                                <td><?php echo $dataPeserta_pelatihan['aktivitas_saat_ini'] ?></td>
                                                <td><?php echo customStatus($dataPeserta_pelatihan['status']) ?></td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#ubahStatus-<?php echo $dataPeserta_pelatihan['id'] ?>" href="tambah-peserta.php?edit=editData&ids=<?= $dataPeserta_pelatihan['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" href="peserta_pelatihan.php?delete=<?php echo $dataPeserta_pelatihan['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php include 'modal-ubah-status-peserta.php' ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
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