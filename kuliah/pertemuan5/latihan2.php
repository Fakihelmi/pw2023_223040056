<?php

$binatang = ['😾', '🐰', '🙉', '🐨', '🐑'];
$warna = ['oren', 'putih', 'coklat', 'abu abu', 'goat'];

// mengurutukan array//
// sort,rsort
// sort($binatang);
// sort($warna);


//MENCETAK ARRAY UNUTK USER//
//FOR,FOREACH//
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peternakanku</title>
</head>

<body>

    <h3>Daftar binatang</h3>
    <ul>
        <?php for ($i = 0; $i < count($binatang); $i++) { ?>
            <li><?php echo $binatang[$i]; ?> <?php  ?></li>
        <?php } ?>


    </ul>

    <h3>Daftar warna </h3>
    <ul>
        <?php for ($i = 0; $i < count($warna); $i++) { ?>
            <li><?php echo $warna[$i]; ?></li>
        <?php } ?>


    </ul>

    <hr>

    <h3>Daftar binatang</h3>
    <ol>
        <?php foreach ($binatang as $b) { ?>
            <li><?php echo $b; ?></li>

        <?php } ?>
    </ol>

    <h3>Daftar warna</h3>
    <ol>
        <?php foreach ($warna as $w) { ?>
            <li><?php echo $w; ?></li>

        <?php } ?>
    </ol>


</body>

</html>