<?php

$str = "TranSISI";
$count = 0;
for ($i = 0; $i < strlen($str); $i++) {
    if (ctype_lower($str[$i])) {
        $count++;
    }
}
echo "Jumlah huruf kecil dalam string adalah: " . $count;