<?php
include "koneksi.php"; 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Developer</title>
    <link rel="icon" href="foto/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">

    <!-- style untuk mengatur warna switch -->
    <style>
      body {
        font-family: slabo;
      }
      body.bg-dark-mode {
        background-color: #343a40;
        color: white;
      }
      body.bg-light-mode {
        background-color: #f8f9fa;
        color: black;
      }
      .btn-active {
        background-color: black;
        color: white;
      }
      .hero-light {
        background-color: #d1e7dd; 
      }
      .hero-dark {
        background-color: #495057; 
      }
      .schedule-light {
        background-color: #f8f9fa;
      }
      .schedule-dark {
        background-color: #343a40;
      }

      .img-fluid {
        border-radius:50%;
        width: 240px;
        height: 240px;
        margin-right: 40px;
        margin-bottom: 15px;
      }
      .gallery-light {
        background-color: #d1e7dd; 
      }
      .gallery-dark {
        background-color: #495057; 
      }
      .icon-light {
        color: black;
      }
      .icon-dark {
        color: white;
      }
      html {
        scroll-behavior: smooth;
      }
    </style>
    <!-- end -->
  </head>
  <body class="bg-light-mode">
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container">
          <a class="navbar-brand" href="#">Ela<strong>Dev</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
              <a class="nav-link" href="#hero">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#project">Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutme">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php" target="_blank">Login</a>
            </li>
            <!-- switch color background web -->
            <li class="nav-item">
              <button class="btn btn-outline-dark m-1" id="lightModeBtn">
                <i class="bi bi-sun"></i> Light
              </button>
            </li>
            <!-- Tombol untuk Dark Mode -->
            <li class="nav-item">
              <button class="btn btn-outline-dark m-1" id="darkModeBtn">
                <i class="bi bi-moon"></i> Dark
              </button>
            </li>
            <!-- end -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav end -->
    <!-- hero begin -->
    <section id="project" class="text-center p-5 hero-light text-sm-start">
      <div class="container">
        <div class="d-sm-flex flex-sm-row-reverse align-item-center">
          <img src="foto/banner.png" class="img-fluid" width="300" alt="png promgramming language">
          <div>
            <h1 class="fw-bold display-4">Take the Leap, Shape Your Future!</h1>
            <h4 class="lead display-6">Seize the opportunity to shape your future from a young age. It's important to determine your path now, as finding a job in today's world can be quite challenging.</h4>
            <!-- jam -->
            <h6>
              <hr>
              <span id="tanggal"></span>
              <span id="jam"></span>
            </h6>
            <!-- end jam -->
          </div>
        </div>
      </div>
    </section>
    <!-- hero end -->
    <!-- project begin -->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">PROJECT</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="foto/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
    <!-- project end -->
    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5 gallery-light">
      <div class="container">
        <h1 class="">GALLERY</h1>
        <div id="carouselExample" class="carousel slide">
          <!-- kumpulan isi -->
          <div class="carousel-inner">
            <div class="carousel-item active"> <!--active ini biar bisa munculin gambar pada gallery-->
              <a href="https://www.figma.com/design/UWkxNfKvaGB8J43ml0zgRo/BORAX?node-id=0-1&t=XBTSvSJhRjAoRfsf-1">
                <img src="foto/Semarang.png" class="d-block w-100" title="Blog Website Semarang">
              </a>
            </div>
            <div class="carousel-item">
              <a href="https://www.figma.com/design/UWkxNfKvaGB8J43ml0zgRo/BORAX?node-id=0-1&t=XBTSvSJhRjAoRfsf-1">
                <img src="foto/LA.png" class="d-block w-100" title="Blog Website Forest">
              </a>
            </div>
            <div class="carousel-item">
              <a href="https://www.figma.com/design/UWkxNfKvaGB8J43ml0zgRo/BORAX?node-id=0-1&t=XBTSvSJhRjAoRfsf-1">
                <img src="foto/gyj.png" class="d-block w-100" title="poster Film">
              </a>
            </div>
            <!-- end -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    <!-- gallery end -->
    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5 schedule-light">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">SCHEDULE</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">SENIN</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  Rekayasa Perangkat Lunak<br />09.30-12.00 | H.4.10
                </li>
                <li class="list-group-item">
                  Logika Informatika<br />12.30-15.00 | H.5.6
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">SELASA</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  Basis Data<br />07.00-08.40 | H.4.1
                </li>
                <li class="list-group-item">
                  Pendidikan Kewarganegaraan<br />10.20-12.00 | Aula E3
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">RABU</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  Basis Data<br />07.00-08.40 | D.3.M
                </li>
                <li class="list-group-item">
                  Pemograman Berbasis Web<br />10.20-12.00 | D.2.J
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">KAMIS</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  Sistem Operasi<br />09.30-12.00 | Kulino
                </li>
                <li class="list-group-item">
                  Sistem Informasi<br />12.30-15.00 | H.5.9
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">JUMAT</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  Probabilitas Stastistika<br />09.30-12.00 | H.3.8
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header bg-danger text-white">SABTU</div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">FREE</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- schedule end -->
    <!-- about begin -->
    <section id="aboutme" class="text-center p-5 gallery-light gallery-dark>
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-center">
          <div class="p-3">
            <img
              src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/07/13/Screenshot-358-3185835934.png"
              class="rounded-circle border shadow"
              width="200"
              height="200"
            />
          </div>
          <div class="p-md-5 text-sm-start">
            <h3 class="lead">A11.2023.15451</h3>
            <h1 class="fw-bold">Amelia Fitri Sibarani</h1>
            Program Studi Teknik Informatika<br />
            <a href="https://dinus.ac.id/" class="fw-bold text-decoration-none text-dark"
              >Universitas Dian Nuswantoro</a
            >
          </div>
        </div>
      </div>
    </section>
    <!-- about end -->
    <!-- footer begin -->
    <footer class="text-left p-5">
      <div class="d-flex justify-content-between align-items-center">
          <div>
              <a href="https://github.com/ela-ftii"><i class="bi bi-github h2 p-2 icon-light" title="Ela github"></i></a>
              <a href="https://www.instagram.com/ela_ftii/"><i class="bi bi-instagram h2 p-2 icon-light" title="Ela instagram"></i></a>
              <a href=""><i class="bi bi-discord h2 p-2 icon-light" title="Ela discord"></i></a>
          </div>
          <div class="text-end p-4">
              Copyright &copy; 2024 Amelia Fitri Sibarani. All Rights Reserved
          </div>
      </div>
    </footer>
    <!-- footer end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- mengatur jam pada website -->
    <script type="text/javascript"> 
      setTimeout("tampilWaktu()", 1000);
      
      function tampilWaktu() {
        var waktu = new Date();
        var bulan = waktu.getMonth() + 1;
        
        setTimeout("tampilWaktu()", 1000); 
        document.getElementById("tanggal").innerHTML = 
          waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
        document.getElementById("jam").innerHTML =
          waktu.getHours() +
          ":" +
          waktu.getMinutes() + 
          ":" +
          waktu.getSeconds(); 
        }

      // Theme switcher
      const lightModeBtn = document.getElementById('lightModeBtn');
      const darkModeBtn = document.getElementById('darkModeBtn');
      const heroSection = document.getElementById('hero');
      const gallerySection = document.getElementById('gallery');
      const scheduleSelection = document.getElementById('schedule');
      const aboutmeSection = document.getElementById('aboutme')
      const icons = document.querySelectorAll('.icon-light, .icon-dark');

      // code light mode
      lightModeBtn.addEventListener('click', () => {
        document.body.classList.remove('bg-dark-mode');
        document.body.classList.add('bg-light-mode');
        
        // Update kelas tombol
        lightModeBtn.classList.add('btn-active');
        darkModeBtn.classList.remove('btn-active');

        // Ubah warna section
        heroSection.classList.remove('hero-dark');
        heroSection.classList.add('hero-light');

        gallerySection.classList.remove('gallery-dark');
        gallerySection.classList.add('gallery-light');

        scheduleSelection.classList.remove('schedule-dark');
        scheduleSelection.classList.add('schedule-light');
        
        aboutmeSection.classList.remove('gallery-dark');
        aboutmeSection.classList.add('gallery-light');

        const collection = document.getElementsByClassName("card");
        for (let i = 0; i < collection.length; i++) {
          collection[i].classList.remove("bg-secondary"); // Hapus kelas latar belakang gelap
          collection[i].classList.remove("text-white"); // Hapus kelas teks putih
          collection[i].classList.add("text-dark"); // Tambahkan kelas card-light
        }

        // Ubah warna ikon
        icons.forEach(icon => {
          icon.classList.remove('icon-dark');
          icon.classList.add('icon-light');
        });
      });
      // end light

      // code dark  mode
      darkModeBtn.addEventListener('click', () => {
        document.body.classList.remove('bg-light-mode');
        document.body.classList.add('bg-dark-mode');
        
        // Update kelas tombol
        darkModeBtn.classList.add('btn-active');
        lightModeBtn.classList.remove('btn-active');

        // Ubah warna section
        heroSection.classList.remove('hero-light');
        heroSection.classList.add('hero-dark');

        gallerySection.classList.remove('gallery-light');
        gallerySection.classList.add('gallery-dark');

        scheduleSelection.classList.remove('schedule-light');
        scheduleSelection.classList.add('schedule-dark');

        aboutmeSection.classList.remove('gallery-light');
        aboutmeSection.classList.add('gallery-dark');


        //ubah warna card saat klik button dark
        const collection = document.getElementsByClassName("card");
        for (let i = 0; i < collection.length; i++) {
          collection[i].classList.add("bg-secondary");
          collection[i].classList.add("text-white");
        }

        // Ubah warna ikon
        icons.forEach(icon => {
          icon.classList.remove('icon-light');
          icon.classList.add('icon-dark');
        });
      });
      // end dark

      // Menutup menu setelah tautan diklik
      const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
      const navbarToggler = document.querySelector('.navbar-toggler');
      navLinks.forEach(link => {
        link.addEventListener('click', () => {
          // Tutup navbar jika terbuka
          if (navbarToggler.getAttribute('aria-expanded') === 'true') {
            navbarToggler.click();
          }
        });
      });
    </script>
  </body>
</html>