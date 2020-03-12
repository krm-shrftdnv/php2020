<?php

function func($strings, $probabilities)
{
    $arr = [];
    $json = [];

    for ($i = 0; $i < 10000; $i++) {

        $arr[array_search(generator($strings, $probabilities), $strings)]++;
    }

    for ($i = 0; $i < sizeof($strings); $i++) {
        $object = [
            "text" => $strings[$i],
            "count" => $arr[$i],
            "calculated_probability" => ($arr[$i] / 10000)
        ];

        $json[] = $object;

    }

    echo json_encode($json, JSON_PRETTY_PRINT);

}

function generator($strings, $probabilities)
{

    asort($probabilities);

    $prob = mt_rand(0, 100);
    $i = 0;
    while ($prob - $probabilities[$i]*100 >= 0) {
        $prob = -$probabilities[$i];
        $i++;
    }

    yield $strings[$i];

}

?>
