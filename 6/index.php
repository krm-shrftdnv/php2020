<?php
$ini = parse_ini_file("index.ini", true, INI_SCANNER_NORMAL);
$file = fopen($ini["main"]["filename"], "r");
$symbols = [];
$symbols[] = $ini["first_rule"]["symbol"];
$symbols[] = $ini["second_rule"]["symbol"];
$symbols[] = $ini["third_rule"]["symbol"];


while (!feof($file)) {
    $string = fgets($file);
    if (startsWith($string, $symbols[0])) {

        echo do_first_rule($string, $ini["first_rule"]["upper"]);

    } elseif (startsWith($string, $symbols[1])) {

        echo do_second_rule($string, $ini["second_rule"]["direction"]);

    } elseif (startsWith($string, $symbols[2])) {

        echo do_third_rule($string, $ini["third_rule"]["delete"]);

    } else echo $string;
    echo "<br>";
}

fclose($file);

function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function do_first_rule($string, $upper): string
{
    if ($upper == true || $upper == false) {
        if ($upper) return strtoupper($string);
        else return strtolower($string);
    } else return "You have broken 'upper' filed in index.ini";
}

function do_second_rule($string, $dir): string
{
    if ($dir === "+" || $dir === "-") {
        if ($dir === "+") {
            return strtr($string, "0123456789", "1234567890");
        } else {
            return strtr($string, "0123456789", "9012345678");
        }
    } else return "You have broken 'direction' filed in index.ini";
}

function do_third_rule($string, $delete)
{
    if (strlen($delete)===1) return str_replace($delete, "", $string);
    else return "You have more than 1 char in 'delete' filed in index.ini";
}

?>