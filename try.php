<?php

    $addThis= 198;
    $num = 0;
    $result = 0;

    while ($addThis != $num) {
        $digit = $addThis % 10;
        $result += $digit;
        $addThis /= 10; 
    }

    echo $result;
    

?>