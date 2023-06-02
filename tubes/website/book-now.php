<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require '../php/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = koneksi();

  // Mendapatkan user_id dari session
  $user_id = $_SESSION["user_id"];

  // Mengambil data dari form
  $dari = $_POST["dari"];
  $ke = $_POST["ke"];
  $jam_berangkat = $_POST["jam_berangkat"];
  $tanggal_berangkat = $_POST["tanggal_berangkat"];
  $jumlah_seat = $_POST["jumlah_seat"];

  // Menambahkan data ke tabel ticket
  $query = "INSERT INTO ticket (user_id, dari, ke, jam_berangkat, tanggal_berangkat, jumlah_seat, status, harga) VALUES ('$user_id', '$dari', '$ke', '$jam_berangkat', '$tanggal_berangkat', '$jumlah_seat', 'Belum lunas', '195.000')";
  mysqli_query($conn, $query);

  // Redirect ke halaman lain setelah berhasil menambahkan data
  header("location: my-book.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>booking-now</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/beranda/book-now.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand me-5" href="#"><i class="fa-solid fa-van-shuttle me-1"></i>Fahmi trans</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link now" href="#">Book now</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my-book.php">My Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
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

  <!--  -->
  <div class="container mt-4">
    <form action="" method="post">
      <div class="from mb-3">
        <label for="dari" class="form-label">From</label>
        <select class="form-select" name="dari" aria-label="Default select example">
          <option selected>Berangkat dari</option>
          <option value="Bandung">Bandung</option>
          <option value="Jakarta">Jakarta</option>
          <option value="Bandara Soekarno hatta">Bandara Soekarno hatta</option>
        </select>
      </div>
      <div class="to mb-3">
        <label for="ke" class="form-label">To</label>
        <select class="form-select" name="ke" aria-label="Default select example">
          <option selected>Pilih tujuan</option>
          <option value="Bandung">Bandung</option>
          <option value="Jakarta">Jakarta</option>
          <option value="Bandara Soekarno hatta">Bandara Soekarno hatta</option>
        </select>
      </div>
      <div class="jam mb-3">
        <label for="jam_berangkat" class="form-label">Jam keberangkatan</label>
        <select class="form-select" name="jam_berangkat" aria-label="Default select example">
          <option selected>Pilih jam keberangkatan</option>
          <option value="07:00:00">7.00 WIB - 10.30 WIB</option>
          <option value="11:00:00">11.00 WIB - 15.30 WIB</option>
          <option value="16:00:00">16.00 WIB - 19.30 WIB</option>
        </select>
      </div>
      <div class="date mb-3">
        <label for="tanggal_berangkat" class="form-label">Date</label>
        <input type="date" name="tanggal_berangkat" class="form-select" aria-label="Default select example" />
      </div>
      <div class="seat mb-3">
        <label for="jumlah_seat" class="form-label">Seat</label>
        <select class="form-select" name="jumlah_seat" aria-label="Default select example">
          <option selected>Jumlah seat</option>
          <option value="1">1 Seat</option>
          <option value="2">2 Seat</option>
          <option value="3">3 Seat</option>
        </select>
      </div>
      <div class="book mb-5 mt-5">
        <button type="submit" class="btn btn-warning w-25 m-auto">Pesan sekarang</button>
      </div>
      <div class="note text-secondary">
        <p>- jam kedatangan bisa saja berubah sesuai kondisi perjalanan</p>
        <p>- Anak dibawah 4 tahun tidak perlu tiket</p>
        <p>- Datang minimal 15 menit sebelum jadwal keberangkatan</p>
      </div>
    </form>
  </div>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>