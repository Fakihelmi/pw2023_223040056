<?php

function urutanAngka($angka)
{
    $mulai = 1;
    for ($i = 1; $i <= $angka; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $mulai . " ";
            $mulai++;
        }
        echo "<br>";
    }
}

// JANGAN LUPA!! menggunakan nilai parameter = 5, maka jumlah baris mengikuti 5 baris
urutanAngka(5);
