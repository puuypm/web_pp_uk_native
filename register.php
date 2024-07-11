<?php
session_start();
include 'config/config.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan !');
              </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}

function register($data)
{
    global $koneksi;

    $id_level = htmlspecialchars($_POST["id_level"]);
    $nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = mysqli_escape_string($koneksi, $data["password"]);

    // // cek username sudah ada atau belum
    // $result = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
    // if (mysqli_fetch_assoc($result)) {
    //     echo "<script>
    //             alert ('Email yang dipilih sudah terdaftar !');
    //           </script>";
    //     return false;
    // }


    // // cek konfirmasi password
    // if ($password == $confirm_password) {
    //     echo "<script>
    //             alert ('Konfirmasi password tidak sesuai !');
    //           </script>";
    //     return false;
    // }

    // enkripsi password
    $pass = sha1($_POST['password']);

    // tambahkan user baru ke dalam database
    mysqli_query($koneksi, "INSERT INTO users (id_level, nama_lengkap, email, password ) VALUES ($id_level,'$nama_lengkap','$email','$pass')");
    return mysqli_affected_rows($koneksi);
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
    <title>Pendaftaran Pelatihan</title>
    <link href="assets/tema/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Buat Akun Baru Pendaftaran Pelatihan
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class=" mb-3">
                                            <label for="">Level</label>
                                            <select name="id_level" id="" class="form-control">
                                                <option value="">-- Pilih Level --</option>
                                                <option value="2">Peserta</option>
                                                <option value="1">Admin Pelatihan</option>
                                                <option value="3">Administrator</option>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="nama_lengkap" class="form-control" id="nama_lengkap"
                                                        type="text" placeholder="Enter your name" required>
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="email" class="form-control" id="email" type="email"
                                                placeholder="name@example.com" required>
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="password" class="form-control" id="password"
                                                        type="password" placeholder="Create a password" required>
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="confirm_password" class="form-control"
                                                        id="confirm_password" type="password"
                                                        placeholder="Confirm password" required>
                                                    <label for="confirm_password">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <button name="register" class="btn btn-primary"
                                                type="submit">Register</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php include 'inc/footer.php'; ?>
        </div>
    </div>
    <?php include 'inc/js.php'; ?>
</body>

</html>