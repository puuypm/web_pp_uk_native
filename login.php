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
    <!-- <form class="form-signin" method="POST" action="cek_login.php"> -->
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <!-- Outer Row -->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-12 col-md-9">
                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-6 d-none d-lg-block bg-login-image text-center my-5 px-5">
                                            <img src="assets/tema/assets/img/ppkd-jakarta-pusat.png" alt="" width="420">
                                        </div>
                                        <div class="col-lg-5 px-4">
                                            <div class="card shadow-lg border-3 rounded-lg mt-5">
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light my-2">Login Pendaftaran
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <form class="form-signin" method="POST" action="cek_login.php">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Masukkan Email Anda ..." required
                                                                autofokus>
                                                            <label for="inputEmail">Email Address</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" name="password" class="form-control"
                                                                placeholder="Masukkan Password Anda ..." required>
                                                            <label for="inputPassword">Password</label>
                                                        </div>
                                                        <div class="form-label-group">
                                                            <select name="id_level" id="" class="form-control">
                                                                <option value="">-- Pilih Level --</option>
                                                                <option value="2">Peserta</option>
                                                                <option value="1">Admin Pelatihan</option>
                                                                <option value="3">Administrator</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="inputRememberPassword"
                                                                type="checkbox" value="">
                                                            <label class="form-check-label"
                                                                for="inputRememberPassword">Remember
                                                                Password</label>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <button name="login" class="btn btn-primary btn-block"
                                                                type="submit">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="card-footer text-center py-3">
                                                    <div class="small"><a href="register.php">Need an account? Sign
                                                            up!</a></div>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- </form> -->
    <?php include 'inc/js.php'; ?>
</body>

</html>