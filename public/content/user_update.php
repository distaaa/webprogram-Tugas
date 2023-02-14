<?php

//$username = htmlspecialchars($_POST['username']);
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = htmlspecialchars($_POST['password']);
$level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);
//hash
//$password_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($username) || empty($password) || empty($level) ) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=user';
        </script>";
} else {

    $sql = "UPDATE user SET username= :username, password = :password, level= :level WHERE username = :username";
    $simpan = $con->prepare($sql);

    //bind
    $simpan->bindParam('username' , $username);
    $simpan->bindParam('password', $password);
    $simpan->bindParam('level', $level);

    //execute
    $simpan->execute();

    if ($simpan->rowCount() > 0) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = 'index.php?page=user';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                window.location.href = 'index.php?page=user';
            </script>";
    }
}
