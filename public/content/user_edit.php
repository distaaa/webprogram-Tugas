<?php
if (isset($_GET['username'])) :
    $username = $_GET['username'];
    $sql = $con->query("SELECT * FROM user WHERE username = '$username'");
    if ($sql->rowCount() == 0) {
        echo "username tidak terdaftar";
    } else {
        # code...
        $row = $sql->fetch();
?>
<div class="row">
    <div class="col-12">
        <h2>User Edit</h2>
        <div class="card">
            <div class="card-body">
                <form action="index.php?page=user_update" method="POST">
                    <div class="mb-2 row">
                        <div class="col-6">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" >
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">password</label>
                            <input type="text" name="password" class="form-control" value="<?= $row['password'] ?>" >
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label ">Level</label>
                        <select name="level" class="form-select" id="">
                            <option <?= ($row['level'] == "Admin") ? "selected" : "" ?>>Admin</option>
                            <option <?= ($row['level'] == "User") ? "selected" : "" ?>>User</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
endif;
?>