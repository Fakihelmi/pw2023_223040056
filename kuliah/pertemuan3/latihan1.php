<?php
echo "Mulai, <br>";
// 1. inisilisasi nilai awal
// 2. terminasi kapan pengulangan berenti
// 3  increment/decrement
$nilai_awal = 1; // inisilisasi

while ($nilai_awal <= 5) { //kondisi terminasi

    echo "Hello world $nilai_awal x<br>";
    $nilai_awal = $nilai_awal + 1; // increment
    // $nilai_awal++; mempermudah

}
echo "Selesai. <br>";


echo "<hr>";
echo "Mulai. <br>";
for ($nilai_awal = 1; $nilai_awal <= 5; $nilai_awal++) {
    echo "Hello world $nilai_awal x. <br>";
}
echo "Selesai. <br>";
