<html lang="en">
    <head>
        <!-- Link CSS Bootstrap -->
        <!-- <link href="path/to/bootstrap.min.css" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Script JS Bootstrap -->
        <!-- <script src="path/to/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <style>
            body {
                font-family: Slabo;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                <i class="bi bi-plus-lg"></i> Tambah Article
            </button>
            <div class="row">
                <div class="table-responsive" id="article_data">

                </div>
                
                <!-- Awal Modal Tambah-->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Article</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Artikel" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="floatingTextarea2">Isi</label>
                                        <textarea class="form-control" placeholder="Tuliskan Isi Artikel" name="isi" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah-->
            </div>
        </div>
        
        <script>
        $(document).ready(function(){
            load_data();
            function load_data(hlm){
                $.ajax({
                    url : "article_data.php",
                    method : "POST",
                    data : {
        				hlm: hlm
        			},
                    success : function(data){
                        $('#article_data').html(data);
                    }
                })
            }

            $(document).on('click', '.halaman', function(){
                var hlm = $(this).attr("id");
                load_data(hlm);
            });
        });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <?php
        include "upload_foto.php";

        // jiika tombol simpan diklik
        if (isset($_POST['simpan'])) {
            $id = $_POST['id'];
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $tanggal = date("Y-m-d H:i:s");
            $username = $_SESSION['username'];
            $gambar = '';
            $nama_gambar = $_FILES['gambar']['name'];
        
            // Jika ada file yang dikirim
            if ($nama_gambar != '') {
                // Panggil function upload_foto untuk cek spesifikasi file yang dikirimkan user
                $cek_upload = upload_foto($_FILES["gambar"]);
            
                // Cek status true/false
                if ($cek_upload['status']) {
                    // Jika true maka message berisi nama file gambar
                    $gambar = $cek_upload['message'];
                } else {
                    // Jika true maka message berisi pesan error, tampilkan dalam alert
                    echo "<script>
                    alert('" . $cek_upload['message'] . "');
                        document.location='admin.php?page=article';
                    </script>";
                    die;
                }
            }
        
            // Cek apakah ada id yang dikirimkan dari form
            if (isset($_POST['id'])) {
                // Jika ada id, lakukan update data dengan id tersebut
                $id = $_POST['id'];
            
                if ($nama_gambar == '') {
                    // Jika tidak ganti gambar
                    $gambar = $_POST['gambar_lama'];
                } else {
                    // Jika ganti gambar, hapus gambar lama
                    unlink("img/" . $_POST['gambar_lama']);
                }
            
                $stmt = $conn->prepare("UPDATE article 
                                        SET 
                                        judul =?,
                                        isi =?,
                                        gambar = ?,
                                        tanggal = ?,
                                        username = ?
                                        WHERE id = ?");

                $stmt->bind_param("sssssi", $judul, $isi, $gambar, $tanggal, $username, $id);
                $simpan = $stmt->execute();
            } else {
                // Jika tidak ada id, lakukan insert data baru
                $stmt = $conn->prepare("INSERT INTO article (judul,isi,gambar,tanggal,username)
                                        VALUES (?,?,?,?,?)");

                $stmt->bind_param("sssss", $judul, $isi, $gambar, $tanggal, $username);
                $simpan = $stmt->execute();
            }
        
            if ($simpan) {
                echo "<script>
                    alert('Simpan data sukses');
                    document.location='admin.php?page=article';
                </script>";
            } else {
                echo "<script>
                    alert('Simpan data gagal');
                    document.location='admin.php?page=article';
                </script>";
            }
        
            $stmt->close();
            $conn->close();
        }

        //jika tombol hapus diklik
        if (isset($_POST['hapus'])) {
            $id = $_POST['id'];
            $gambar = $_POST['gambar'];
        
            if ($gambar != '') {
                //hapus file gambar
                unlink("img/" . $gambar);
            }
        
            $stmt = $conn->prepare("DELETE FROM article WHERE id =?");
        
            $stmt->bind_param("i", $id);
            $hapus = $stmt->execute();
        
            if ($hapus) {
                echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?page=article';
                </script>";
            } else {
                echo "<script>
                alert('Hapus data gagal');
                document.location='admin.php?page=article';
                </script>";
            }
        
            $stmt->close();
            $conn->close();
        }
        ?>
    </body>
</html>