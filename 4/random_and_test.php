<?php

function func($strings, $probabilities)
{
    $strongs = [];

    foreach ($strings as $string) {
        $strongs[] = [
            'string' => $string,
            'count' => 0
        ];
    }

    for ($i = 0; $i < 10000; $i++) {
        foreach (generator($strings, $probabilities) as $string) {
            foreach ($strongs as &$strong) {
                if ($strong['string'] == $string) {
                    $strong['count']++;
                }
            }
        }

    }

    $json = [];

    foreach ($strongs as &$strong) {
        $object = [
            "text" => $strong['string'],
            "count" => $strong['count'],
            "calculated_probability" => round(($strong['count'] / 10000), 2)
        ];

        $json[] = $object;

    }

    echo json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

}

function generator($strings, $probabilities)
{
    $strongs = [];
    for ($i = 0; $i < sizeof($strings); $i++) {
        $strongs[] = [
            'string' => $strings[$i],
            'prob' => $probabilities[$i] * 100
        ];
    }

    $prob = mt_rand(0, 100);
    $max = 0;
    $maxProbString = "";
    $min = 100;
    $yString = "";
    foreach ($strongs as $strong) {
        if (($strong['prob'] >= $prob) && ($strong['prob'] <= $min)) {
            $min = $strong['prob'];
            $yString = $strong['string'];
        }
        if ($strong['prob'] >= $max) {
            $max = $strong['prob'];
            $maxProbString = $strong['string'];
        }
    }

    if ($min != 100) {
        yield $yString;
    } else yield $maxProbString;

}
