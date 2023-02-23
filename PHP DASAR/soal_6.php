<?php 

$arr = [
    ['f', 'g', 'h', 'i'],
    ['j', 'k', 'p', 'q'],
    ['r', 's', 't', 'u']
   ];

function cari($arr,$str){
    $arr_str=str_split($str);
    $res=[];
    foreach($arr as $item){
        for ($i = 0; $i < count($item); $i++) {
            if (!in_array($arr_str[$i], $item)) {
                $res[]= "false";
            } else{
                $res[]= "true";
            }

            if(in_array("true",$res)){
                return "true";
            }else{
                return "false";
            }
        }
    }
}

echo cari($arr,'fghi');
echo cari($arr, 'fghp');  

