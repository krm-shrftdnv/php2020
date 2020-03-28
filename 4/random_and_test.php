<?php

function func($strings, $probabilities)
{
    $arr = array_fill(0, 3, 0);
    $json = [];

    for ($i = 0; $i < 10000; $i++) {
        foreach (generator($strings, $probabilities) as $string)
            $arr[array_search($string, $strings)]++;
    }

    for ($i = 0; $i < sizeof($strings); $i++) {
        $object = [
            "text" => $strings[$i],
            "count" => $arr[$i],
            "calculated_probability" => round(($arr[$i] / 10000), 2)
        ];

        $json[] = $object;

    }

    echo json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

}

function generator($strings, $probabilities)
{

    asort($probabilities);

    $prob = mt_rand(0, 100);
    $i = 0;
    foreach ($probabilities as $pro) {
        if ($prob - ($pro * 100) >= 0) {
            continue;
        } else {
            $i = array_search($pro, $probabilities);
            break;
        }
    }

    yield $strings[$i];

}

?>
