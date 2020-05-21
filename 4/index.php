<?php

//include("form4.html");
require("random_and_test.php");
//
//if (!isset ($_REQUEST['text'])) {
//    return;
//}
//
//$text = $_REQUEST['text'];

//for testing
$text = "some string 23
another string 24
and another one 3";

$strings = explode(PHP_EOL, $text);
$probabilities = [];
$sum = 0;
foreach ($strings as $string) {
    $arr = explode(" ", $string);
    $sum += $arr[sizeof($arr) - 1];
};

$data = [];

foreach ($strings as $string) {
    $arr = explode(" ", $string);
    $weight = $arr[sizeof($arr) - 1];
    $probabilities[] = $weight/$sum;
    unset($arr[sizeof($arr) - 1]);
    $string = implode(" ", $arr);

    $object = [
        "text" => $string,
        "weight" => $weight,
        "probability" => round(($weight / $sum), 2)
    ];

    $data[] = $object;

}

$json = [
    "sum" => $sum,
    "data" => $data
];

$output = json_encode($json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo "<pre>";
echo($output);
echo PHP_EOL;
echo PHP_EOL;
func($strings, $probabilities);
echo "</pre>";
