<?php

    $tr = '';

    $trcut = explode(' ', $tr);
    var_dump($trcut);
    if(!empty($trcut)){
        echo $trcut[0];
        echo $trcut[1];
    }
    else{
        echo 'rong';
    }



    echo empty($t);