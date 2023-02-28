<?php

// 1. inisilisasi nilai awal
// 2. terminasi kapan pengulangan berenti
// 3  increment/decrement
$nilai_angkot = 1; // inisilisasi
$ledeng = "beroperasi dengan baik";
while ($nilai_angkot <= 10) { //kondisi terminasi

    echo "<B>Angkot no.$nilai_angkot $ledeng<br>";
    $nilai_angkot = $nilai_angkot + 1; // increment

}
