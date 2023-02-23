<?php 

$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$arr_nilai=explode(" ",$nilai);

//Rata-rata
$rata_rata = array_sum($arr_nilai)/count($arr_nilai);
echo "Rata-rata: ".round($rata_rata);

echo "<br>";

//Urut dari 7 yang tertinggi
rsort($arr_nilai);
$tujuh_tertinggi = array_slice($arr_nilai, 0, 7);
echo "7 Nilai Tertinggi: ".implode($tujuh_tertinggi,",");

echo "<br>";

//Urut dari 7 yang terendah
sort($arr_nilai);
$tujuh_tertinggi = array_slice($arr_nilai, 0, 7);
echo "7 Nilai Terendah: ".implode($tujuh_tertinggi,",");