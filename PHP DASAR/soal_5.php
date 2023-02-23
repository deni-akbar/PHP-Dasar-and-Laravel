<?php


$huruf = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
$str =  "DFHKNQ";

$hasil = "";
for ($i = 0; $i < strlen($str); $i++) {
    $index = array_search($str[$i], $huruf);
    $x=$i+1;

    if ($i % 2 == 0) {
        $hasil.= $huruf[$index+$x];
    } else {
        $hasil.= $huruf[$index-$x];
    }
}

echo $hasil;