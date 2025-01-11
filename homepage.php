// homepage.php
<?php
// Koneksi ke database
include "koneksi.php";

// Query untuk mengambil data gambar
$sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil = $conn->query($sql);

// Tampilkan data gambar
$i = 0;
while ($row = $hasil->fetch_assoc()) {
  ?>
  <div class="carousel-item <?php if ($i == 0) { echo 'active'; } ?>">
    <img src="img/<?php echo $row['gambar']; ?>" class="d-block w-100" alt="<?php echo $row['judul']; ?>">
  </div>
  <?php
  $i++;
}
?>