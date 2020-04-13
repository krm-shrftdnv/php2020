<?php
include("7/form7.html");
set_time_limit(0);
if (!isset ($_REQUEST['link'])) return;
$link = escapeshellarg($_REQUEST['link']);
$type = $_REQUEST['type'];

$message = "Проверьте имя узла и повторите попытку.";

$arr = [];

exec($type . ' ' . $link, $arr);

mb_convert_variables("UTF-8", "cp866", $arr);

//foreach ($arr as $string) {
//    echo $string;
//    echo "<br>";
//}

if (sizeof($arr) < 3) echo $message;
else decorate($arr, $type);

function decorate($strings, $type)
{
    $arr = [];
    preg_match('/\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3}/', $strings[1], $arr);
    $address = $arr[0];
    echo "<b>" . $address . "</b><br>";
    switch ($type) {
        case 'ping' :
        {
            preg_match('/[^0-9]/', $strings[9], $arr);
            $loss = $arr[0];
            echo "Successful requests - " . (100 - (int)$loss) . "%";
            break;
        }
        case 'tracert' :
        {
            echo "Jumps were to:<br>";
            for ($i = 4; $i < sizeof($strings) - 2; $i++) {
                if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $strings[$i], $arr)) echo $arr[0] . " ";
            }
            break;
        }
    }
}
