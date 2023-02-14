<?php

$nim = filter_var($_POST['nim'], FILTER_SANITIZE_STRING);
$nama = htmlspecialchars($_POST['nama']);
$jurusan = filter_var($_POST['jurusan'], FILTER_SANITIZE_STRING);
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);

if (empty($nim) || empty($nama) || empty($jurusan) || empty($alamat)) {
    echo "<script>
            alert('Data tidak boleh kosong');
            window.location.href = 'index.php?page=mahasiswa';
        </script>";
} else {

    $sql = "UPDATE mahasiswa SET nama = :nama, jurusan = :jurusan, alamat = :alamat WHERE nim = :nim";
    $simpan = $con->prepare($sql);

    //bind
    $simpan->bindParam('nama', $nama);
    $simpan->bindParam('jurusan', $jurusan);
    $simpan->bindParam('alamat', $alamat);
    $simpan->bindParam('nim', $nim);

    //execute
    $simpan->execute();

    if ($simpan->rowCount() > 0) {
        echo "<script>
                alert('Data berhasil diubah');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah');
                window.location.href = 'index.php?page=mahasiswa';
            </script>";
    }
}
