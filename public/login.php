<?php
require_once '../config/fungsi.php';
require_once 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login Form</h5>
                        <form action="ceklogin.php" method="POST">
                            <div class="mb-2 form-floating">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" autocomplete="off" required>
                                <label for="username" class="form-label">Username</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required>
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <div class="mb-2 d-grid">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>