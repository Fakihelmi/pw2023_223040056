<?php
$mahasiswa = [
    [
        "Nama" => "Lisvindanu",
        "Nrp" => "223040038",
        "Email" => "Lisvindanu.223040038@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "danu.jpeg"
    ],
    [
        "Nama" => "Ilham Ramadhan Hartono",
        "Nrp" => "223040013",
        "Email" => "Ilham.223040013@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "ilham.jpeg"
    ],
    [
        "Nama" => "Fakih Helmi Maulana",
        "Nrp" => "223040056",
        "Email" => "Fakih.223040056@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "fakih.jpeg"
    ],
    [
        "Nama" => "Ji'ta Bilhaq",
        "Nrp" => "223040055",
        "Email" => "Ji'ta.223040055@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "jita.jpeg"
    ],
    [
        "Nama" => "Ahmad Suherman",
        "Nrp" => "223040066",
        "Email" => "Ahmad.223040066@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "madara.png"
    ],
    [
        "Nama" => "Hedi Sukur",
        "Nrp" => "223040071",
        "Email" => "Hedi.223040071@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "toneri.png"
    ],
    [
        "Nama" => "Aurelia Melati Suci",
        "Nrp" => "223040045",
        "Email" => "Aurelia.223040045@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "eida.jpg"
    ],
    [
        "Nama" => "Febby Alia Rahman",
        "Nrp" => "223040059",
        "Email" => "Febby.223040059@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "shiho.png"
    ],
    [
        "Nama" => "Alief Arrizal Efendi",
        "Nrp" => "223040061",
        "Email" => "Alief.223040061@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "kaworu.png"
    ],
    [
        "Nama" => "Angga Nugraha Sofyan",
        "Nrp" => "223040052",
        "Email" => "Angga.223040052@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "gendo.jpg"
    ],
    [
        "Nama" => "Muhamad alfath septian",
        "Nrp" => "223040014",
        "Email" => "Alfath.223040014@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "gambar" => "apat.jpeg"
    ]

]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>

</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan4.php?Nama=<?= $mhs["Nama"]; ?>
                &nrp=<?= $mhs["Nrp"]; ?>
                &email=<?= $mhs["Email"] ?>
                &jurusan=<?= $mhs["Jurusan"] ?>
                &poto=<?= $mhs["gambar"] ?>">
                    <?= $mhs["Nama"]; ?></a>
            </li>

        <?php endforeach; ?>
    </ul>
</body>

</html>