<?php
// Memulai session atau melanjutkan session yang sudah ada
session_start();
// Check apakah ada variable username yang tersimpan pada session
if (!isset($_SESSION['username'])) {
    // Jika tidak ada, alihkan ke halaman login
    header("location:login.php");
    exit;
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Daily Journal | Admin</title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 100px;
            background-color: #f0f8ff;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            background-color: #004085;
            color: white;
            padding: 20px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .navbar {
            background-color: #007bff !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .nav-item .dropdown-toggle {
            color: #ffc107 !important;
        }

        .dropdown-menu {
            background-color: #6c757d;
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:hover {
            background-color: #ffc107 !important;
        }

        h4.lead {
            color: #dc3545;
        }

        a {
            color: #007bff;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/gambar udinus.png" alt="logo" width="50" height="50" class="me-2">
                My Daily Journal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <section id="content" class="p-5">
        <div class="container">
            <?php
            if (isset($_GET['page'])) {
                echo '<h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">' . ucfirst($_GET['page']) . '</h4>';
                include($_GET['page'] . ".php");
            } else {
                echo '<h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Dashboard</h4>';
                include("dashboard.php");
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div>
            <a href="https://www.instagram.com/akbar_dwi_saputra22/">
                <i class="bi bi-instagram h2 p-2"></i>
            </a>
            <a href="https://www.tiktok.com/@ads082703">
                <i class="bi bi-tiktok h2 p-2"></i>
            </a>
            <a href="https://wa.me/+6282137773875">
                <i class="bi bi-whatsapp h2 p-2"></i>
            </a>
        </div>
        <div>Akbar Dwi Saputro &copy; 2024</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
