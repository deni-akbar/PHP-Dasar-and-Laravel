<?php

$text = "Jakarta adalah ibukota negara Republik Indonesia";
$words = explode(" ", $text);
$count_word=count($words);

// Membuat bigram
$bigram = "";
for ($i = 0; $i < $count_word; $i++) {
    $x=$i+1;
    if ($x % 2 == 0 && $i != 0) {
        if($i+1 == $count_word){
            $bigram .= $words[$i-1]." ".$words[$i];
        }else{
            $bigram .= $words[$i-1]." ".$words[$i].", ";
        } 
    }
}

// Membuat trigram
$trigram = "";
for ($i = 0; $i < $count_word; $i++) {
    $x=$i+1;
    if ($x % 3 == 0 && $i != 0) {
        if($i+1 == $count_word){
            $trigram .= $words[$i-2]." ".$words[$i-1]." ".$words[$i];
        }else{
            $trigram .= $words[$i-2]." ".$words[$i-1]." ".$words[$i].", ";
        } 
    }
}


// Menampilkan hasil
echo "Unigram: " . implode(", ", $words) . "<br>";
echo "Bigram: " . $bigram . "<br>";
echo "Trigram: " . $trigram . "<br>";

