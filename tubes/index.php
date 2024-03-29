<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: website/login.php");
  exit;
}

require 'php/functions.php';

$conn = koneksi();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>beranda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="css/beranda/beranda.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary pt-3 pb-3">
    <div class="container-fluid">
      <a class="navbar-brand me-5" href="#"><i class="fa-solid fa-van-shuttle me-1"></i>Fahmi trans</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link now" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="website/book-now.php">Book now</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="website/my-book.php">My Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="website/profile.php">Profile</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-dark" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Carousel -->
  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/hero-1.jpg" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="assets/hero-1.jpg" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="assets/hero-1.jpg" class="d-block w-100" alt="..." />
      </div>
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

  <div class="container">
    <h1 class="text-center">- Tentang Kami -</h1>
    <p class="mt-3 ps-2 pe-2">
      Fahmi Trans adalah sebuah agen shuttle yang menyediakan layanan travel
      antara Bandung dan Jakarta. Sebagai agen shuttle yang terpercaya, Fahmi
      Trans selalu berusaha memberikan pelayanan terbaik bagi pelanggannya
      dengan memastikan perjalanan yang aman, nyaman, dan terjangkau.
      <br />
      Fahmi Trans menawarkan berbagai pilihan armada shuttle yang dapat
      disesuaikan dengan kebutuhan dan budget pelanggan. Armada shuttle yang
      disediakan oleh Fahmi Trans terjaga kebersihan dan kenyamanannya,
      sehingga pelanggan dapat merasa nyaman dan santai selama perjalanan.
      <br />
      Fahmi Trans memiliki tim pengemudi yang berpengalaman dan terlatih dalam
      mengemudikan kendaraan shuttle, sehingga pelanggan dapat merasa aman dan
      nyaman selama perjalanan. Selain itu, tim pengemudi juga berkomitmen
      untuk mengutamakan keselamatan dan kenyamanan pelanggan.
      <br />
      Dengan pelayanan yang profesional dan terpercaya, Fahmi Trans siap
      menjadi mitra perjalanan Anda antara Bandung dan Jakarta.
    </p>
    <div class="layanan mt-5">
      <h1 class="text-center mb-4">- Layanan kami -</h1>
      <div class="layanan-card d-flex">
        <div class="layanan-left d-flex">
          <div class="layanan-1 mb-2 item-lay">
            Bandara Soekarno hatta -> Bandung
          </div>
          <div class="layanan-2 mb-2 item-lay">
            Bandung -> Bandara Soekarno hatta
          </div>
        </div>
        <div class="layanan-right d-flex">
          <div class="layanan-3 mb-2 item-lay">Jakarta -> Bandung</div>
          <div class="layanan-4 mb-2 item-lay">Bandung -> Jakarta</div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer mt-5">
    <p class="text-center mt-3">
      Copyright 2023 © fahmitrans.com. Designed By Fakihelmi
    </p>
  </div>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>