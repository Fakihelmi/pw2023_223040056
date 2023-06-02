<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}

require '../php/functions.php';

$conn = koneksi();

$id = $_GET["id"];
$ticket = query("SELECT * FROM ticket JOIN user ON ticket.user_id = user.user_id WHERE id = $id")[0];

if (isset($_POST["bayar"])) {
  $nama_rekening = htmlspecialchars($_POST["nama_rekening"]);
  $nomor_rekening = htmlspecialchars($_POST["nomor_rekening"]);
  $bukti_transfer = $_FILES["bukti_transfer"]["name"];
  $bukti_transfer_tmp = $_FILES["bukti_transfer"]["tmp_name"];
  $bukti_transfer_ext = strtolower(pathinfo($bukti_transfer, PATHINFO_EXTENSION));

  // Memeriksa jenis file
  $allowed_ext = array('png', 'jpg', 'jpeg');
  if (!in_array($bukti_transfer_ext, $allowed_ext)) {
    echo "<script>alert('Jenis file tidak didukung. Harap pilih file dengan ekstensi PNG, JPG, atau JPEG.');</script>";
  } else {
    // Proses upload file bukti transfer
    move_uploaded_file($bukti_transfer_tmp, "../admind/assets/bukti-tf/" . $bukti_transfer);

    // Simpan data ke tabel pembayaran
    $query = "INSERT INTO pembayaran (nama_rekening, nomor_rekening, bukti_transfer, ticket_id, user_id)
            VALUES ('$nama_rekening', '$nomor_rekening', '$bukti_transfer', {$ticket['id']}, {$ticket['user_id']})";
    mysqli_query($conn, $query);

    // Redirect ke halaman yang diinginkan setelah berhasil menyimpan data pembayaran
    header("Location: my-book.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/beranda/pembayaran.css" />
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

  <div class="container">
    <div class="teks text-center mt-3">
      <h1>Pembayaran di transfer ke</h1>
      <p>
        <span class="norek">1620043xxxxx / Fahmi trans</span>
        <br />
        Rekening di atas adalah <span class="text-bold">Bank mandiri</span>
      </p>
    </div>
    <div class="card card-login">
      <form action="" method="post" enctype="multipart/form-data">
        <!--  -->
        <div class="mb-3">
          <label for="nama_rekening" class="form-label">Nama Rekening</label>
          <input type="text" class="form-control" id="nama_rekening" name="nama_rekening" placeholder="Masukkan nama rekening" required />
        </div>
        <!--  -->
        <div class="mb-3">
          <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
          <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan nomor rekening anda" required />
        </div>

        <!--  -->
        <div class="mb-3">
          <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
          <input type="file" class="form-control" id="bukti_transfer" name="bukti_transfer" accept=".png, .jpg, .jpeg" required />
        </div>
        <!--  -->
        <button type="submit" name="bayar" class="btn btn-primary">Kirim</button>
        <!--  -->
      </form>
    </div>
  </div>
  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>