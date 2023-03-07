<?php 
//ARRAY//

//MEMBUAT ARRAY//

$hari = array('senin','selasa','rabu','kamis','jumat','sabtu','minggu');
$bulan= ['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november'];
$myArray=['hikaf','10','false'];
$binatang=['😾','🐰','🙉','🐨','🐑'];

//MENCETAK ARRAY//

var_dump($hari);
print_r($bulan);
var_dump($myArray);
echo $binatang [4];
var_dump($binatang);

echo "<hr>";

//MENAMBAH ELEMEN ARRAY DIAKHIR ARRAY//
$bulan[]='Desember';
var_dump($bulan);

//MENAMBAH ELEMEN DI AWAL ARRAY/
array_unshift($binatang, '🐍','🐯');
print_r($binatang);


echo "<hr>";
//MENGHAPUS ARRAY DIAKHIR //

array_pop($hari);
print_r ($hari);

//MENGHAPUS DIAWAL ARRAY//
echo "<hr>";

array_shift($hari);
print_r($hari);
