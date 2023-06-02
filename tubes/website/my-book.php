<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require '../php/functions.php';

$conn = koneksi();

// Mendapatkan user_id dari session
$user_id = $_SESSION["user_id"];

// Query untuk mendapatkan data tiket
$info = query("SELECT * FROM ticket JOIN user ON ticket.user_id = user.user_id WHERE user.user_id = '$user_id'");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>my-booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/beranda/my-book.css" />
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
            <a class="nav-link" href="book-now.php">Book now</a>
          </li>
          <li class="nav-item">
            <a class="nav-link now" href="#">My Booking</a>
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
  <div class="container">

    <?php
    foreach ($info as $t) :
      $totalHarga = $t['harga'] * $t['jumlah_seat']; ?>
      <a class="text-decoration-none text-dark" href="detail-tiket.php?id=<?= $t["id"] ?>">
        <div class="card-tiket bg-light p-3 mt-3 mb-2">
          <div class="code-booking">
            <p>Booking :<span> <?= $t['id'] ?></span></p>
          </div>
          <div class="rute text-secondary">
            <?= $t['dari'] ?> -> <?= $t['ke'] ?>
          </div>
          <div class="date"><?= $t['tanggal_berangkat'] ?> / <?= $t['jam_berangkat'] ?> WIB</div>
          <div class="price text-warning text-bold">Rp. <?= $totalHarga ?>.000 </div>
          <div class="status mt-4">
            <?php if ($t['status'] == 'Lunas') : ?>
              <button type="button" class="btn btn-success"><?= $t['status']; ?></button>
            <?php else : ?>
              <a href="pembayaran.php?id=<?= $t["id"] ?>"><button type="button" name="bayar[]" value="<?= $t['id'] ?>" class="btn btn-danger"><?= $t['status']; ?></button></a>
            <?php endif; ?>
          </div>
        </div>
      </a>
    <?php endforeach; ?>

    <!--  -->
    <div class="note mt-5 mb-5">
      <p>
        - Status <span class="text-warning text-bold">Menunggu</span> artinya
        sedang menunggu keberangkatan
      </p>
      <p>
        - Status <span class="text-success text-bold">Completed</span> artinya
        perjalanan sudah terselesaikan
      </p>
      <p>
        - Status
        <span class="text-primary text-bold">Verifikasi</span> artinya sedang
        proses verifikasi pembayaran
      </p>
    </div>
  </div>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>