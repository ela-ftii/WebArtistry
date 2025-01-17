<?php
session_start();

include "koneksi.php";  

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) { 
	header("location:login.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo.png">
    <title>Web Developer | Admin</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style> 
        #content {
            min-height: 460px;
        } 
        .hero-light {
            background-color: #d1e7dd; 
        }
        .dropdown-menu {
            display: block;
            position: absolute; 
            z-index: 1000; 
        }
    </style>
</head>
<body class="hero-light">
    <!-- nav begin -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="index.html">Ela<strong>Dev</strong></a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=article">Article</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
            </li> 
            <li class="nav-item fw-bold">
                <a class="nav-link" href="index.php#gallery">Homepage</a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username']?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                    <li><a class="dropdown-item" href="admin.php?page=user">Profile User</a></li> 
                </ul>
            </li> 
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav end -->
    <!-- content begin -->
    <section id="content" class="p-5">
        <div class="container"> 
        <?php
        if (isset($_GET['page'])) {
        ?>
            <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">
                <?php
                if ($_GET['page'] == 'user') {
                    echo 'Profile';
                }else {
                    echo ucfirst($_GET['page']);
                }
                ?>
            </h4>
            <?php
            if ($_GET['page'] == 'gallery') {
                include('gallery.php');
            }else {
                include($_GET['page'] . ".php");
            }
        } else {
        ?>
            <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Dashboard</h4>
            <?php
            include("dashboard.php");
        }
        ?>
        </div> 
    </section>
    <!-- content end -->
    <!-- footer begin -->
    <footer class="text-center p-4 bg-white" >
    <div class="d-flex justify-content-between align-items-center ">
          <div>
              <a href="https://github.com/ela-ftii"><i class="bi bi-github h2 p-2 text-dark" title="Ela github"></i></a>
              <a href="https://www.instagram.com/ela_ftii/"><i class="bi bi-instagram h2 p-2 text-dark" title="Ela instagram"></i></a>
              <a href=""><i class="bi bi-discord h2 p-2 text-dark" title="Ela discord"></i></a>
          </div>
          <div class="text-end p-4 text-dark">
              Copyright &copy; 2024 Amelia Fitri Sibarani. All Rights Reserved
          </div>
    </footer>
    <!-- footer end -->
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
    ></script>
</body>
</html> 