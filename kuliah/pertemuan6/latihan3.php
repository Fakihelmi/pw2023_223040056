<?php
// $mahasiswa = [
//     ["Lisvin danu", "223040038", "lisvindanu015@gmail.com", "Teknik Informatika"],
//     ["pakih helmi", "2230400056", "pakihtampa@gmail.com", "teknik konoha"]
// ];

//array assosiative
//def sama seperti array numerik, kecuali
//key nya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama" => "Lisvindanu",
        "nrp" => "223040038",
        "email" => "lisvindanu015@gmail.com",
        "jurusan" => "Teknik Informatika"
    ],
    [
        "nama" => "pakih",
        "nrp" => "223040056",
        "email" => "pakihtampa@gmail.com",
        "jurusan" => "Teknik Informatika",
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) :  ?>
        <ul>
            <li><?= $mhs["nama"] ?></li>
            <li><?= $mhs["nrp"] ?></li>
            <li><?= $mhs["jurusan"] ?></li>
            <li><?= $mhs["email"] ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>