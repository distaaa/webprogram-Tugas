<?php

$nim = filter_var($_POST['nim'], FILTER_SANITIZE_STRING);
$nama = htmlspecialchars($_POST['nama']);
$jurusan = filter_var($_POST['jurusan'], FILTER_SANITIZE_STRING);;
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);;

if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=mahasiswa';
        </script>";
} else {

    //cek
    $cek = $con->query("SELECT * FROM mahasiswa WHERE nim = '$nim'");

    if ($cek->rowCount() == 0) {
        $sql = "INSERT INTO mahasiswa VALUES (?, ?, ?, ?)";
        $simpan = $con->prepare($sql);

        //bind
        $simpan->bindParam(1, $nim);
        $simpan->bindParam(2, $nama);
        $simpan->bindParam(3, $jurusan);
        $simpan->bindParam(4, $alamat);

        //execute
        $simpan->execute();


        if ($simpan->rowCount() > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
        }
    } else {
        echo "<script>
                alert('NIM sudah ada!');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    }
}
