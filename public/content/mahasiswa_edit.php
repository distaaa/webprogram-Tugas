<?php
if (isset($_GET['nim'])) :
    $nim = $_GET['nim'];
    $sql = $con->query("SELECT * FROM mahasiswa WHERE nim = '$nim'");
    if ($sql->rowCount() == 0) {
        echo "Nim tidak terdaftar";
    } else {
        # code...
        $row = $sql->fetch();
?>
        <div class="row">
            <div class="col-12">
                <h2>Edit Mahasiswa</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?page=mahasiswa_update" method="POST">
                            <div class="mb-2 row">
                                <div class="col-6">
                                    <label for="" class="form-label">NIM</label>
                                    <input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jurusan</label>
                                <select name="jurusan" class="form-select" id="">
                                    <option <?= ($row['jurusan'] == "Teknik Informatika") ? "selected" : "" ?>>Teknik Informatika</option>
                                    <option <?= ($row['jurusan'] == "Sistem Informasi") ? "selected" : "" ?>>Sistem Informasi</option>
                                    <option <?= ($row['jurusan'] == "Manajemen Informatika") ? "selected" : "" ?>>Manajemen Informatika</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                            </div>
                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
endif;
?>