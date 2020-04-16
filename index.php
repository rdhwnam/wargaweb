<?php

require_once('database/database.php');

// session start
session_start();

$db = new Database();
$connection = $db->databaseConnection();

if (isset($_POST['loginbtn'])) {
    $emailadmin = $_POST['emailadmin'];
    $passwordadmin = md5($_POST['passwordadmin']);

    $data = mysqli_query($connection, "SELECT email_admin, password_admin FROM admin_table WHERE email_admin='$emailadmin' AND password_admin='$passwordadmin'");

    if (mysqli_num_rows($data) > 0) {
        $_SESSION['email_admin'] = $emailadmin;
        $_SESSION['login_status'] = 'login';
        header('location: dashboard/index.php');
    } else {
        header('location: index.php?pesan=gagal');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WargaWEB | Sistem Informasi Kependudukan Kecamatan</title>

    <!-- bootstrap 4 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- css style -->
    <style>
        body {
            background-color: #39D152;
            padding: 0;
            margin: 0;
            height: 100vh;
        }

        .container {
            margin-top: 160px;
            width: 500px;
        }
    </style>
</head>

<body>
    <!-- login -->
    <div class="container">
        <div class=" row">
            <div class="col-md-12">
                <?php

                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'gagal') {
                ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertGagal">
                            <strong>Peringatan!</strong> Proses Login Gagal. E-Mail dan Password Salah.
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else if ($_GET['pesan'] == 'logout') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alertLogout">
                            <strong>Berhasil!</strong> Anda Berhasil Logout.
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    } else if ($_GET['pesan'] == 'belum_login') {
                    ?>
                        <div class="alert alert-warning fade show" role="alert" id="alertBelumLogin">
                            <strong>Warning!</strong> Anda Harus Login Untuk Mengakses Halaman Admin!
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                }

                ?>
                <div class="card">
                    <div class="card-header">
                        Login Admin
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="emailadmin">E-Mail</label>
                                <input type="email" name="emailadmin" id="emailadmin" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="passwordadmin">Password</label>
                                <input type="password" name="passwordadmin" id="passwordadmin" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success" name="loginbtn">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootstrap 4 js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>