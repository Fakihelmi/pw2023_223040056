<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require '../php/functions.php';

$id = $_GET["id"];
$ticket = query("SELECT * FROM ticket JOIN user ON ticket.user_id = user.user_id WHERE id = $id")[0];

$totalHarga = $ticket['harga'] * $ticket['jumlah_seat'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>detail-tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/beranda/detail-tiket.css" />
  <style>
    @media print {
      .navbar {
        display: none;
      }

      .btn-danger {
        display: none;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container">
      <a href="my-book.php">
        <i class="fa-solid fa-arrow-left text-dark"></i>
      </a>
      <a class="navbar-brand" href="#"><i class="fa-solid fa-van-shuttle me-1"></i>Fahmi trans</a>
    </div>
  </nav>

  <button class="btn btn-danger mt-4 ms-4 mb-4" onclick="window.print()">Download</button>

  <div class="container">
    <div class="card-detail">
      <div class="kode-booking bg-warning ps-2 pe-2 rounded">
        <p class="pt-2 pb-2 ps-2 pe-2">
          Booking<span> FT23042023/01/11/1</span>
        </p>
      </div>
      <div class="nama-penumpang m">
        <span class="text-bold">Nama penumpang :</span> <?= $ticket['nama_lengkap'] ?>
      </div>
      <div class="tujuan m">
        <span class="text-bold">Tujuan :</span> <?= $ticket['dari'] ?> ->
        <?= $ticket['ke'] ?>
      </div>
      <div class="tanggal-berangkat m">
        <span class="text-bold">Tanggal keberangkatan :</span> <?= $ticket['tanggal_berangkat'] ?> / <?= $ticket['jam_berangkat'] ?> WIB
      </div>
      <div class="jumlah-seat m">
        <span class="text-bold">Jumlah seat :</span> <?= $ticket['jumlah_seat'] ?>
      </div>
      <div class="jumlah-seat m">
        <span class="text-bold">Harga total :</span> Rp <?= $totalHarga ?>.000
      </div>
      <div class="status mt-4">
        <?php if ($ticket['status'] == 'Lunas') : ?>
          <button type="button" class="btn btn-success"><?= $ticket['status']; ?></button>
        <?php else : ?>
          <button type="button" class="btn btn-danger"><?= $ticket['status']; ?></button>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>