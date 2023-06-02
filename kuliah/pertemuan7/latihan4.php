<?php
//cek apakah tidak ada data di $_GET
if (
    !isset($_GET["Nama"])
    || !isset($_GET["nrp"])
    || !isset($_GET["email"])
    || !isset($_GET["jurusan"])
    || !isset($_GET["poto"])
)
    // redirect
    header("Location: latihan3.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>
    <ul>
        <li><img src="img/<?= $_GET["poto"]; ?>"> </li>
        <li><?= $_GET["Nama"]; ?></li>
        <li><?= $_GET["nrp"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
    </ul>
    <a href="latihan3.php">Kembali ke daftar mahasiswa</a>
</body>

</html>