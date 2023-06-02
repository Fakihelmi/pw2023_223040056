<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login-admind.php");
    exit;
}

require '../php/functions.php';

$conn = koneksi();

$Tampil = query("SELECT p.*, t.*, u.* , p.id as id_bayar
              FROM pembayaran p
              INNER JOIN ticket t ON p.ticket_id = t.id
              INNER JOIN user u ON p.user_id = u.user_id
              WHERE t.status = 'Belum lunas'");

if (isset($_POST['setuju'])) {
    $id = $_POST['id'];
    $query = "UPDATE ticket SET status = 'Lunas' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "
            <script>
                alert('Konfirmasi persetujuan berhasil!');
                window.location.href = 'verifikasi-ticket.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Konfirmasi gagal!');
                window.location.href = 'verifikasi-ticket.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-verifikasi</title>
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
                        <a class="nav-link" href="daftar-user.php">Daftar User</a>
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
        <?php
        foreach ($Tampil as $t) :
            $totalHarga = $t['harga'] * $t['jumlah_seat'];
        ?>
            <form action="" method="post">
                <div class="card border-3 mb-4 border-warning">
                    <div class="card-header bg-warning text-dark">
                        <h2 class="card-title p-1">Fahmi trans</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nomor Pembayaran : <?php echo $t['id']; ?></p>
                        <p class="card-text">Nama Penumpang : <?php echo $t['nama_lengkap']; ?></p>
                        <p class="card-text">Tanggal Keberangkatan : <?php echo $t['tanggal_berangkat']; ?></p>
                        <p class="card-text">Waktu Keberangkatan : <?php echo $t['jam_berangkat']; ?></p>
                        <p class="card-text">Keberangkatan : <?php echo $t['dari']; ?></p>
                        <p class="card-text">Tujuan : <?php echo $t['ke']; ?></p>
                        <p class="card-text">Jumlah seat : <?php echo $t['jumlah_seat']; ?> Seat</p>
                        <p class="card-text">Harga : Rp <?php echo $totalHarga; ?>.000</p>
                        <a href="detail-bayar.php?id=<?= $t["id_bayar"] ?>" class="text-decoration-none">Detail pembayaran</a>
                        <br>
                        <input type="hidden" name="id" value="<?= $t['ticket_id']; ?>">
                        <button name="setuju" class="btn btn-warning mt-3">Verifikasi</button>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>