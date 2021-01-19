<?php

function euclides($array, $comparisonArray) {
    $powResults = [];
    for ($i=0; $i < count($array); $i++) {
        $var1 = $array[$i];
        $var2 = $comparisonArray[$i];
        array_push($powResults, pow($var1 - $var2, 2));
    }

    $sumResult = 0;
    foreach ($powResults as $result) {
        $sumResult += $result; 
    }

    $finalResult = sqrt($sumResult);
    return $finalResult;
}

?>