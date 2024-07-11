<?php
session_start();
// panggil koneksi database
include 'config/config.php';

$pass = sha1($_POST['password']);
$email = mysqli_escape_string($koneksi, $_POST['email']);
$password = mysqli_escape_string($koneksi, $pass);
$id_level = mysqli_escape_string($koneksi, $_POST['id_level']);


// cek email terdaftar atau tidak
$cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' and id_level = '$id_level'");
$email_valid = mysqli_fetch_array($cek_email);

//uji jika email terdaftar
if ($email_valid) {
    // jika email terdaftar
    // cek password sesuai atau tidak
    if ($password == $email_valid['password']) {
        // jika password sesuai
        // buat session

        $_SESSION['email'] = $email_valid['email'];
        $_SESSION['nama_lengkap'] = $email_valid['nama_lengkap'];
        $_SESSION['id_level'] = $email_valid['id_level'];

        // uji level user
        if ($id_level == "1") {
            header("location: dashboard_pelatihan.php");
        }
        if ($id_level == "3") {
            header("location: dashboard.php");
        }
        if ($id_level == "2") {
            header("location: dashboard_siswa.php");
        }
    } else {
        echo "<script>alert('Maaf login gagal, Password anda tidak sesuai!');
        document.location='login.php'</script>";
    }
} else {
    echo "<script>alert('Maaf login gagal, Email anda tidak terdaftar!');
    document.location='login.php'</script>";
}
