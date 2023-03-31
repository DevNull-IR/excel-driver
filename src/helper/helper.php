<?php
function PMT($rate, $nper, $pv, $fv = 833333, $type = 0): string
{
    return $PMT = (-$fv - $pv * pow(1 + $rate, $nper)) /
        (1 + $rate * $type) /
        ((pow(1 + $rate, $nper) - 1) / $rate);;
}


function AVERAGE($number, $number2, ...$numbers){
    $sum = $number + $number2;
    $count = count($numbers) + 2;
    foreach ($numbers as $numberForeach) {
        $sum += $numberForeach;
    }
    return $sum / $count;
}

function SUMPRODUCT($array1, ...$arrays){
    $arraysM = [];
    if (count($arrays) != 0){
        foreach ($arrays as $key => $array) {
            if (is_array($array)){
                foreach ($array as $k => $item) {
                    if (!isset($arraysM[$k]))
                        $arraysM[$k] = 1;
                    $arraysM[$k] *= $item;
                }
            }
        }
    }
    foreach ($array1 as $k => $item) {
        if (!isset($arraysM[$k]))
            $arraysM[$k] = 1;
        $arraysM[$k] *= $item;
    }


    return array_sum($arraysM);
}

function SUM(...$n){
    $plus = 0;
    foreach ($n as $item) {
        $plus += $item;
    }
    return $plus;
}

function LEN($string){
    return strlen($string);
}