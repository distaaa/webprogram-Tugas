<?php

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = htmlspecialchars($_POST['password']);
$level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);
//hash
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($username) || empty($password)) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=user';
        </script>";
} else {

    //cek
    $cek = $con->query("SELECT * FROM user WHERE username = '$username'");

    if ($cek->rowCount() == 0) {
        $sql = "INSERT INTO user (username, password, level) VALUES (?, ?, ?)";
        $simpan = $con->prepare($sql);

        //bind
        $simpan->bindParam(1, $username);
        $simpan->bindParam(2, $password_hash);
        $simpan->bindParam(3, $level);

        //execute
        $simpan->execute();

        if ($simpan->rowCount() > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = 'index.php?page=user';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
                window.location.href = 'index.php?page=user';
            </script>";
        }
    } else {
        echo "<script>
                alert('Username sudah ada!');
                window.location.href = 'index.php?page=user';
            </script>";
    }
}
