<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Daily Journal</title>
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/gambar udinus.png" alt="logo Image" width="50" height="50" class="me-2"> UDINUS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#article">Article</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
                    <button type="button" class="btn btn-dark theme" id="dark" title="dark">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>
                    <button type="button" class="btn btn-danger theme" id="light" title="light">
                        <i class="bi bi-brightness-high"></i>
                    </button>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="text-center p-5 bg-primary-subtle text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/banner.jpg" class="img-fluid" width="600" />
                <div>
                    <h1 class="fw-bold display-4">
                        Selamat Datang
                        <hr>Ini adalah tugas saya
                    </h1>
                    <h4 class="lead display-6">Ini adalah halaman tampilan utama</h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Section -->
    <section id="article" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM article ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);

                while ($row = $hasil->fetch_assoc()) {
                ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="img/<?= $row["gambar"] ?>" class="card-img-top" style="width:300px;height:300px" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["judul"] ?></h5>
                                <p class="card-text">
                                    <?= $row["isi"] ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">
                                    <?= $row["tanggal"] ?>
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

    <!-- Gallery Section -->
    <section id="gallery" class="text-center p-5 bg-primary-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExampleIndicators" class="carousel slide carousel-dark">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <?php
                    $sql = "SELECT * FROM galery ORDER BY tanggal DESC";
                    $hasil = $conn->query($sql);

                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <div class="carousel-item active">
                            <img src="img/<?= $row["foto"] ?>" class="d-block w-100" style="width:1500px; height:600px;" alt="..." />
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light"><?= $row["judul"] ?></h5>
                                <p class="text-light"><?= $row["isi"] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer id="footer" class="footer-light">
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML =
                waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML =
                waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
        }

        document.getElementById("dark").onclick = function () {
            document.body.style.backgroundColor = "black";
            document.body.style.color = "white";

            document.getElementById("hero").classList.replace("bg-primary-subtle", "bg-secondary");
            document.getElementById("gallery").classList.replace("bg-primary-subtle", "bg-secondary");
            document.getElementById("footer").classList.replace("footer-light", "footer-dark");

            const cards = document.getElementsByClassName("card");
            for (let card of cards) {
                card.classList.add("bg-secondary", "text-white");
            }
        };

        document.getElementById("light").onclick = function () {
            document.body.style.backgroundColor = "white";
            document.body.style.color = "black";

            document.getElementById("hero").classList.replace("bg-secondary", "bg-primary-subtle");
            document.getElementById("gallery").classList.replace("bg-secondary", "bg-primary-subtle");
            document.getElementById("footer").classList.replace("footer-dark", "footer-light");

            const cards = document.getElementsByClassName("card");
            for (let card of cards) {
                card.classList.remove("bg-secondary", "text-white");
            }
        };
    </script>

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        #hero {
            background-color: #e7f3ff;
        }

        #gallery {
            background-color: #e7f3ff;
        }

        #footer {
            background-color: #004085;
            color: white;
            padding: 20px 0;
            text-align: center;
            transition: all 0.3s ease;
        }

        .footer-light {
            background-color: #f8f9fa;
            color: #000;
        }

        .footer-dark {
            background-color: #212529;
            color: #fff;
        }

        .navbar {
            background-color: #007bff !important;
        }

        .navbar-brand img {
            border-radius: 50%;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .btn.theme {
            margin-left: 5px;
        }

        .card {
            border: 1px solid #ced4da;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #007bff;
        }

        .carousel-caption h5,
        .carousel-caption p {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</body>

</html>
