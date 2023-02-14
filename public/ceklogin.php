<?php
session_start();
require_once 'config/koneksi.php';
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if (empty($username) || empty($password)) {
    echo "<script>
            alert('Username / Password Kosong');
            window.location.href = 'login.php';
        </script>";
} else {
    #cek username
    $cek = $con->prepare("SELECT * FROM user WHERE username = ?");
    $cek->bindParam(1, $username);
    $cek->execute();

    if ($cek->rowCount() > 0) {
        # username ada
        $data = $cek->fetch();
        # cek password
        if (password_verify($password, $data['password'])) {
            # password benar, buat session
            $_SESSION['web2_ti3f'] = $data['username'];
            $_SESSION['web2_ti3f_level'] = $data['level'];


            echo "<script>
                alert('Selamat Datang $username');
                window.location.href = 'index.php';
            </script>";
        } else {
            # password salah...
            echo "<script>
                alert('Password salah');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        # username tidak ada
        echo "<script>
            alert('Username salah');
            window.location.href = 'login.php';
        </script>";
    }
}
