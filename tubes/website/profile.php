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

// Memproses form jika tombol "Delete" diklik
if (isset($_POST['hapus'])) {
  // Hapus terlebih dahulu data pembayaran yang terkait dengan tiket
  $queryPembayaran = "DELETE FROM pembayaran WHERE ticket_id IN (SELECT id FROM ticket WHERE user_id = $user_id)";
  mysqli_query($conn, $queryPembayaran);

  // Hapus terlebih dahulu data tiket yang terkait dengan pengguna
  $queryTicket = "DELETE FROM ticket WHERE user_id = $user_id";
  mysqli_query($conn, $queryTicket);

  // Hapus akun dari database
  $queryUser = "DELETE FROM user WHERE user_id = $user_id";
  $hapus = mysqli_query($conn, $queryUser);

  // Logout user dan arahkan ke halaman login
  if ($hapus) {
    session_destroy();
    header("location: login.php");
    exit;
  } else {
    echo "Gagal menghapus akun";
  }
}

// Ambil data user berdasarkan user_id
$query = "SELECT * FROM user WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>my-profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/beranda/profile.css" />
  <style>
    .shadow-box {
      box-shadow: 0 0 4px black;
    }

    @media screen and (max-width: 700px) {
      .card-profile {
        width: 100% !important;
      }
    }
  </style>
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
            <a class="nav-link" href="my-book.php">My Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
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

  <div class="container">
    <div class="card-profile w-50 m-auto bg-light p-3 rounded shadow-box mt-3">
      <h3 class="text-center mb-4 mt-2">Profile anda</h3>
      <div class="mb-3 w-75 m-auto d-flex flex-column">
        <label class="fw-bold mb-1" for="nama_lengkap">Nama lengkap</label>
        <input class="border-2 border-warning rounded p-2" type="text" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
      </div>
      <div class="mb-3 w-75 m-auto d-flex flex-column">
        <label class="fw-bold mb-1" for="username">Username</label>
        <input class="border-2 border-warning rounded p-2" type="text" name="username" value="<?= $user['username'] ?>">
      </div>
      <div class="mb-5 w-75 m-auto d-flex flex-column">
        <label class="fw-bold mb-1" for="nomor_hp">Nomer handphone</label>
        <input class="border-2 border-warning rounded p-2" type="text" name="nomor_hp" value="<?= $user['nomor_hp'] ?>">
      </div>
      <div class="button-class d-flex mt-2">
        <a class="btn btn-danger me-2" href="../php/logout.php">Logout</a>
        <form method="POST" onsubmit="return confirm('Apakah Anda yakin menghapus akun?')">
          <button class="btn btn-danger" name="hapus">Delete</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>