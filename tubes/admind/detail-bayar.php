<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login-admind.php");
    exit;
}

require '../php/functions.php';

$conn = koneksi();

$id = $_GET["id"];
$pembayaran = query("SELECT p.*, t.*, u.* 
                    FROM pembayaran p
                    INNER JOIN ticket t ON p.ticket_id = t.id
                    INNER JOIN user u ON p.user_id = u.user_id
                    WHERE p.id = $id");

if (empty($pembayaran)) {
    die("Pembayaran tidak ditemukan");
}

$pembayaran = $pembayaran[0]; // Ambil data pembayaran pada indeks 0

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand" href="#">Fahmi trans</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card border-3 mb-4 border-warning">
            <div class="card-header bg-warning text-dark">
                <h2 class="card-title p-1">Detail Pembayaran</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Nama Rekening</h4>
                        <p><?= $pembayaran['nama_rekening']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h4>Nomor Rekening</h4>
                        <p><?= $pembayaran['nomor_rekening']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Nomor Ticket</h4>
                        <p><?= $pembayaran['ticket_id']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h4>Nama Penumpang</h4>
                        <p><?= $pembayaran['nama_lengkap']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Bukti Transfer</h4>
                        <img src="assets/bukti-tf/<?= $pembayaran['bukti_transfer']; ?>" alt="Bukti Transfer" class="img-fluid w-25">
                    </div>
                </div>
                <!-- tambahkan informasi lain yang Anda inginkan -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>