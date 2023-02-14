<?php if ($level == "Admin") : ?>
    <div class="row">
        <div class="col-12">
            <h2>Mahasiswa</h2>
            <div class="card">
                <div class="card-body">
                    <form action="index.php?page=mahasiswa_save" method="POST">
                        <div class="mb-2 row">
                            <div class="col-6">
                                <label for="" class="form-label">NIM</label>
                                <input type="text" name="nim" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Jurusan</label>
                            <select name="jurusan" class="form-select" id="">
                                <option>Teknik Informatika</option>
                                <option>Sistem Informasi</option>
                                <option>Manajemen Informatika</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JURUSAN</th>
                                <th>ALAMAT</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $con->query("SELECT * FROM mahasiswa");
                            while ($row = $sql->fetch()) {
                                echo "<tr>
                                    <td>$row[nim]</td>
                                    <td>$row[nama]</td>
                                    <td>$row[jurusan]</td>
                                    <td>$row[alamat]</td>
                                    <td>
                                        <a href='index.php?page=mahasiswa_edit&nim=$row[nim]' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='index.php?page=mahasiswa_delete&nim=$row[nim]' onclick=\"return confirm('Hapus Data?')\" class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>