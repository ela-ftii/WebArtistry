<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<style>
    body {
        font-family: Slabo;
    }
</style>

<?php
// Include file koneksi database
include "koneksi.php";

if (!isset($_GET['page']) || $_GET['page'] != 'user') {
    include "admin.php";
} else {
    ?>
    <div class="container mt-5">
        <div class="card border-0 shadow rounded-3">
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="password" class="form-label">Ganti Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
                    </div>
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Ganti Foto Profil</label>
                        <input type="file" class="form-control" id="profilePicture" name="profile_picture" accept="img/*">
                    </div>
                    <div class="mb-3">
                        <div class="text-start">
                            <h6 class="fw-bold">Foto Profil Saat Ini</h6>
                            <?php
                            $sql = "SELECT foto FROM user WHERE username = 'user'";
                            $hasil = $conn->query($sql);
                            $row = $hasil->fetch_assoc();
                            if ($row['foto'] != '') {
                                echo "<img src='img/" . $row['foto'] . "?v=" . time() . "' alt='Current Profile' class='img-thumbnail' style='width: 150px; height: auto;'>";
                            } else {
                                echo "<p>Tidak ada foto profil</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        // Ubah password
        $password = $_POST['password'];
        $md5_password = MD5($password);
        $sql = "UPDATE user SET password = '$md5_password' WHERE username = 'user'";
        $conn->query($sql);
        echo "Password berhasil diubah!";
    }

    if (isset($_FILES['profile_picture'])) {
        // Ubah foto profil
        $img = $_FILES['profile_picture']['name'];
        $tmp = $_FILES['profile_picture']['tmp_name'];
        clearstatcache();
        if (move_uploaded_file($tmp, "img/" . $img)) {
            $sql = "UPDATE user SET foto = '$img' WHERE username = 'user'";
            $conn->query($sql);
            echo "Foto profil berhasil diubah!";
        } else {
            echo "Gagal mengupload foto profil!";
        }
    }
}
?>

