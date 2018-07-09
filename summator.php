<?php

$firstNum       = "123456123456123456123456";
$secondNum      = "987654987654987654987655";

$firstNum       = strrev($firstNum);
$secondNum      = strrev($secondNum);
$countFirst     = strlen($firstNum);
$countSecond    = strlen($secondNum);
$sumNum         = '';
$overload       = 0;
$iterator       = ($countFirst >= $countSecond) ? $countFirst : $countSecond;



for($i = 0; $i < $iterator; $i++){
    $tempSum = $firstNum[$i] + $secondNum[$i] + $overload;
    if($tempSum >= 10){
        $tempSum = $tempSum - 10;
        $overload = 1;
    }else{
        $overload = 0;
    }
    $sumNum[$i] = $tempSum;
}
if($overload == 1){
    $sumNum[$iterator] = $overload;
}

$sumNum = strrev(implode($sumNum));

print($sumNum);
