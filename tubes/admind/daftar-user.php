<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login-admind.php");
    exit;
}

require '../php/functions.php';

$conn = koneksi();

$Tampil = query("SELECT * FROM user");

$i = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-daftar-user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
            <a class="navbar-brand" href="#">Fahmi trans</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Daftar User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="verifikasi-ticket.php">Verifikasi Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat-sukses.php">Riwayat Pembayaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 id="daftar-user">Daftar User</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nomor HP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Tampil as $t) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $t['nama_lengkap']; ?></td>
                        <td><?= $t['username']; ?></td>
                        <td><?= $t['nomor_hp']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>