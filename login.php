<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();

if ($_POST) {
    include_once 'includes/login.inc.php';
    $login = new Login($db);

    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);

    if ($login->login()) {
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Gagal Total')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metode WP (Weighted Product) : Sistem Pendukung Keputusan</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            margin-right: 10px;
        }

        .login-container {
            margin-top: 100px;
        }

        .login-logo {
            display: block;
            margin: 30 auto 30px;
            height: 80px;
            /* Atur tinggi gambar sesuai kebutuhan */
            width: 180px align:max-content;
        }
    </style>
</head>

<body style="background:rgb(45, 110, 222)  url(images/back2.jpeg) left bottom fixed;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="panel panel-default login-container">
                    <div class="panel-body">
                        <div class="text-center">
                            <!-- Gambar di atas form -->
                            <img src="images/logodg.jpeg" class="login-logo" alt="logo-img">
                            <h3><b>Login</b></h3>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <label for="InputUsername1">Username</label>
                                <input type="text" class="form-control" name="username" id="InputUsername1"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="InputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword1"
                                    placeholder="Password" required>
                            </div>
                            <p><small style="color:#999;">Masukkan email & Password Anda</small></p>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>