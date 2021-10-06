<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="icon" href="assets/img/logo.jpg">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="assets/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <h3 class="text-center font-weight-light my-4">SELAMAT DATANG</h3>
                                    <form class="user" method="post" action="cek_login.php">
                                        <div class="form-group">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter Username" />
                                            <?php
                                            if (isset($_GET['error']) == 1) {
                                                echo "<small class='form-text text-danger'>Username Salah</small>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" />
                                            <?php
                                            if (isset($_GET['error']) == 2) {
                                                echo "<small class='form-text text-danger'>Password Salah</small>";
                                            }
                                            ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary text-center">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-3.4.0.min.js"></script>
        <script src="'assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assetsjs/scripts.js"> </script>
</body>

</html>