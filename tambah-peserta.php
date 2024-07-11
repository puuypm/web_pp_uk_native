<?php
session_start();
include 'config/config.php';

// Jika button disubmit, ambil nilai dari form, nama, email, password
//if (isset($_POST['simpan'])) {
//    $nama_lengkap = $_POST['nama_lengkap'];
//    $email = $_POST['email'];
//    $password = sha1($_POST['password']);
//    $id_level = $_POST['id_level'];

// masukkan ke dalam table user dimana kolom nama di ambil nilainya dari inputan nama
//    $insertUsers = mysqli_query($koneksi, "INSERT INTO users(nama_lengkap, email, password, id_level) VALUES('$nama_lengkap','$email','$password','$id_level')");
//    header("location:user.php?notif=tambah-success");
//}

// Jika parameter delete ada, buat perintah/query delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM peserta_pelatihan WHERE id='$id'");
    header('location:peserta_pelatihan.php?notif=delete-success');
}

// Tampilkan semua data dari tabel user dimana id nya diambil dari parameter edit
if (isset($_GET['edit'])) {
    $id = $_GET['ids'];

    $queryEdit = mysqli_query($koneksi, "SELECT * FROM peserta_pelatihan WHERE id='$id'");
    $dataEdit = mysqli_fetch_assoc($queryEdit);
    // var_dump($dataEdit);
}

if (isset($_POST['edit']) && $_POST['edit'] == "Ubah") {
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
    $aktivitas_saat_ini = $_POST['aktivitas_saat_ini'];
    $status = $_POST['status'];

    $id = $_GET['ids'];


    // Ubah data dari table user dimana nilai nama diambil dari inputan nama
    // dan nilai id usernya diambil dari parameter

    $edit = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET 
                id_jurusan='$id_jurusan', 
                id_gelombang='$id_gelombang',
                nama_lengkap='$nama_lengkap', 
                nik='$nik', 
                kartu_keluarga='$kartu_keluarga', 
                jenis_kelamin='$jenis_kelamin', 
                tempat_lahir='$tempat_lahir',
                tanggal_lahir='$tanggal_lahir', 
                pendidikan_terakhir='$pendidikan_terakhir', 
                nama_sekolah='$nama_sekolah', 
                kejuruan='$kejuruan', 
                nomor_hp='$nomor_hp', 
                email='$email', 
                aktivitas_saat_ini='$aktivitas_saat_ini', 
                status='$status' 
            WHERE id=$id");
    header('location:peserta_pelatihan.php?notif=edit-success');
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Data Pendaftaran Pelatihan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
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
                    <h1 class="mt-4">Data Peserta Pelatihan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="peserta_pelatihan.php">Data Peserta Pelatihan</a></li>
                        <?php if (isset($_GET['edit'])) { ?>
                        <li class="breadcrumb-item"><a href="peserta_pelatihan.php">Edit Peserta Pelatihan</a></li>
                        <?php } else { ?>
                        <li class="breadcrumb-item"><a href="tambah-peserta.php">Tambah Peserta Pelatihan</a></li>
                        <?php } ?>
                    </ol>
                    <div class="card mb-4">
                        <?php if (isset($_GET['edit']) && $_GET['edit'] == 'editData') { ?>
                        <div class="card">
                            <div class="card-header">Edit Peserta Pelatihan</div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="">Jurusan</label>
                                        <select name="id_jurusan" id="" class="form-control">
                                            <option value="">-- Pilih Jurusan --</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 0) ? 'selected' : '' ?>
                                                value="0">Web Programming</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 1) ? 'selected' : '' ?>
                                                value="1">Operator Komputer</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 2) ? 'selected' : '' ?>
                                                value="2">Bahasa Inggris</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 3) ? 'selected' : '' ?>
                                                value="3">Desain Grafis</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 4) ? 'selected' : '' ?>
                                                value="4">Tata Boga</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 5) ? 'selected' : '' ?>
                                                value="5">Tata Busana</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 6) ? 'selected' : '' ?>
                                                value="6">Tata Graha</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 7) ? 'selected' : '' ?>
                                                value="7">Teknik Pendingin</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 8) ? 'selected' : '' ?>
                                                value="8">Teknik Komputer</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 9) ? 'selected' : '' ?>
                                                value="9">Otomotif Sepeda Motor</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 10) ? 'selected' : '' ?>
                                                value="10">Jaringan Komputer</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 11) ? 'selected' : '' ?>
                                                value="11">Barista</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 12) ? 'selected' : '' ?>
                                                value="12">Bahasa Korea</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 13) ? 'selected' : '' ?>
                                                value="13">Make Up Artist</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 14) ? 'selected' : '' ?>
                                                value="14">Video Editor</option>
                                            <option <?php echo ($dataEdit['id_jurusan'] == 15) ? 'selected' : '' ?>
                                                value="15">Content Creator</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Gelombang</label>
                                        <select name="id_gelombang" id="" class="form-control">
                                            <option value="">-- Pilih Gelombang --</option>
                                            <option <?php echo ($dataEdit['id_gelombang'] == 0) ? 'selected' : '' ?>
                                                value="0">Angkatan 4</option>
                                            <option <?php echo ($dataEdit['id_gelombang'] == 1) ? 'selected' : '' ?>
                                                value="1">Angkatan 1</option>
                                            <option <?php echo ($dataEdit['id_gelombang'] == 2) ? 'selected' : '' ?>
                                                value="2">Angkatan 2</option>
                                            <option <?php echo ($dataEdit['id_gelombang'] == 3) ? 'selected' : '' ?>
                                                value="3">Angkatan 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Nama Lengkap</label>
                                        <input value="<?php echo $dataEdit['nama_lengkap'] ?>" type="text"
                                            class="form-control" name="nama_lengkap"
                                            placeholder="Masukkan Nama Lengkap Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">NIK</label>
                                        <input type="number" class="form-control" name="nik"
                                            value="<?php echo $dataEdit['nik'] ?>" placeholder="Masukkan NIK Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Kartu Keluarga</label>
                                        <input type="number" class="form-control" name="kartu_keluarga"
                                            placeholder="Masukkan Kartu Keluarga Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option <?php echo ($dataEdit['jenis_kelamin']) ? 'selected' : '' ?>
                                                value="Laki-laki">Laki-laki</option>
                                            <option <?php echo ($dataEdit['jenis_kelamin']) ? 'selected' : '' ?>
                                                value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tempat Lahir</label>
                                        <input value="<?php echo $dataEdit['tempat_lahir'] ?>" type="text"
                                            class="form-control" name="tempat_lahir"
                                            placeholder="Masukkan Tempat Lahir Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            placeholder="Masukkan Tanggal Lahir Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Pendidikan Terakhir</label>
                                        <input value="<?php echo $dataEdit['pendidikan_terakhir'] ?>" type="text"
                                            class="form-control" name="pendidikan_terakhir"
                                            placeholder="Masukkan Pendidikan Terakhir Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Nama Sekolah</label>
                                        <input value="<?php echo $dataEdit['nama_sekolah'] ?>" type="text"
                                            class="form-control" name="nama_sekolah"
                                            placeholder="Masukkan Nama Sekolah Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Kejuruan</label>
                                        <select name="kejuruan" id="" class="form-control">
                                            <option value="">-- Pilih Kejuruan --</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 0) ? 'selected' : '' ?>
                                                value="Web Programming">Web Programming</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 1) ? 'selected' : '' ?>
                                                value="Operator Komputer">Operator Komputer</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 2) ? 'selected' : '' ?>
                                                value="Bahasa Inggris">Bahasa Inggris</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 3) ? 'selected' : '' ?>
                                                value="Desain Grafis">Desain Grafis</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 4) ? 'selected' : '' ?>
                                                value="Tata Boga">Tata Boga</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 5) ? 'selected' : '' ?>
                                                value="Tata Busana">Tata Busana</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 6) ? 'selected' : '' ?>
                                                value="Tata Graha">Tata Graha</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 7) ? 'selected' : '' ?>
                                                value="Teknik Pendingin">Teknik Pendingin</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 8) ? 'selected' : '' ?>
                                                value="Teknik Komputer">Teknik Komputer</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 9) ? 'selected' : '' ?>
                                                value="Otomotif Sepeda Motor">Otomotif Sepeda Motor</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 10) ? 'selected' : '' ?>
                                                value="Jaringan Komputer">Jaringan Komputer</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 11) ? 'selected' : '' ?>
                                                value="Barista">Barista</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 12) ? 'selected' : '' ?>
                                                value="Bahasa Korea">Bahasa Korea</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 13) ? 'selected' : '' ?>
                                                value="Make Up Artist">Make Up Artist</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 14) ? 'selected' : '' ?>
                                                value="Video Editor">Video Editor</option>
                                            <option <?php echo ($dataEdit['kejuruan'] == 15) ? 'selected' : '' ?>
                                                value="Content Creator">Content Creator</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Nomor Telepon</label>
                                        <input type="number" class="form-control" name="nomor_hp"
                                            placeholder="Masukkan Nomor Telepon Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input value="<?php echo $dataEdit['email'] ?>" type="email"
                                            class="form-control" name="email" placeholder="Masukkan Email Anda ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Aktivitas Saat Ini</label>
                                        <input value="<?php echo $dataEdit['aktivitas_saat_ini'] ?>" type="text"
                                            class="form-control" name="aktivitas_saat_ini"
                                            placeholder="Masukkan Aktivitas Anda Saat Ini ...">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option <?php echo ($dataEdit['status'] == 0) ? 'selected' : '' ?>
                                                value="0">Tidak Lulus</option>
                                            <option <?php echo ($dataEdit['status'] == 1) ? 'selected' : '' ?>
                                                value="1">Peserta Lulus</option>
                                            <option <?php echo ($dataEdit['status'] == 2) ? 'selected' : '' ?>
                                                value="2">Lulus Wawancara</option>
                                            <option <?php echo ($dataEdit['status'] == 3) ? 'selected' : '' ?>
                                                value="3">Lulus Administrasi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary" name="edit" value="Ubah">
                                        <a href="peserta_pelatihan.php" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                                <?php } else { ?>
                                <div class="card">
                                    <div class="card-header">Tambah Peserta Pelatihan</div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label for="">Jurusan</label>
                                                <select name="id_jurusan" id="" class="form-control">
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    <option value="0">Web Programming</option>
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
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Gelombang</label>
                                                <select name="id_gelombang" id="" class="form-control">
                                                    <option value="">-- Pilih Gelombang --</option>
                                                    <option value="0">Angkatan 4</option>
                                                    <option value="1">Angkatan 1</option>
                                                    <option value="2">Angkatan 2</option>
                                                    <option value="3">Angkatan 3</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Lengkap</label>
                                                <input value="" type="text" class="form-control" name="nama_lengkap"
                                                    placeholder="Masukkan Nama Lengkap Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">NIK</label>
                                                <input type="number" class="form-control" name="nik"
                                                    placeholder="Masukkan NIK Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Kartu Keluarga</label>
                                                <input type="number" class="form-control" name="kartu_keluarga"
                                                    placeholder="Masukkan Kartu Keluarga Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="" class="form-control">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tempat Lahir</label>
                                                <input value="" type="text" class="form-control" name="tempat_lahir"
                                                    placeholder="Masukkan Tempat Lahir Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir"
                                                    placeholder="Masukkan Tanggal Lahir Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Pendidikan Terakhir</label>
                                                <input value="" type="text" class="form-control"
                                                    name="pendidikan_terakhir"
                                                    placeholder="Masukkan Pendidikan Terakhir Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nama Sekolah</label>
                                                <input value="" type="text" class="form-control" name="nama_sekolah"
                                                    placeholder="Masukkan Nama Sekolah Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Kejuruan</label>
                                                <select name="kejuruan" id="" class="form-control">
                                                    <option value="">-- Pilih Kejuruan --</option>
                                                    <option value="Web Programming">Web Programming</option>
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
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nomor Telepon</label>
                                                <input type="number" class="form-control" name="nomor_hp"
                                                    placeholder="Masukkan Nomor Telepon Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Email</label>
                                                <input value="" type="email" class="form-control" name="email"
                                                    placeholder="Masukkan Email Anda ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Aktivitas Saat Ini</label>
                                                <input value="" type="text" class="form-control"
                                                    name="aktivitas_saat_ini"
                                                    placeholder="Masukkan Aktivitas Anda Saat Ini ...">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="0">Tidak Lulus</option>
                                                    <option value="1">Peserta Lulus</option>
                                                    <option value="2">Lulus Wawancara</option>
                                                    <option value="3">Lulus Administrasi</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <input type="submit" class="btn btn-primary" name="simpan"
                                                    value="Simpan">
                                                <a href="peserta_pelatihan.php" class="btn btn-danger">Kembali</a>
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