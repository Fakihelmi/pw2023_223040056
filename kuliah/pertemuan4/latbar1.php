<?php 
 $angka=10;
 {function cek_ganjil_genap ($angka);
if ($angka % 2===1)  {
    return "$angka adalah bilangan GANJIL";
}   else{
    return "$angka adalah bilangan GENAP";
}
 }


echo cek_ganjil_genap(10);