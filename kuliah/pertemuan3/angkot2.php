<?php
// 1. inisilisasi nilai awal
// 2. terminasi kapan pengulangan berenti
// 3  increment/decrement
$nilai_awal = 1; // inisilisasi\/
$nilai = 1;

while ($nilai_awal <= 6) { //kondisi terminasi

    echo "Angkot no.$nilai_awal beroperasi dengan baik<br>";
    $nilai_awal = $nilai_awal + 1; // increment
    // $nilai_awal++; mempermudah

}

for ($nilai = 7; $nilai <= 10; $nilai++) {
    echo "Angkot no.$nilai sedang rusak.<br>";
}
