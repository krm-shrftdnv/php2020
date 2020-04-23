<?php
include "AbstrLogger.php";
include "FileLogger.php";
include "BrowserLogger.php";

$type = $_REQUEST["logger_type"];
$text = $_REQUEST["text"];
$logger;
switch ($type){
    case "File":{
        $path = $_REQUEST["file_name"];
        $logger = new FileLogger($path);
        break;
    }
    case "Browser":{
        $time_format = $_REQUEST["time_format"];
        $logger = new BrowserLogger($time_format);
        break;
    }
    default:{
        echo "Something went wrong";
        return;
    }
}
logText($text,$logger);

function logText($text, $logger) {
    if($logger instanceof AbstrLogger){
        $strings = explode(PHP_EOL, $text);
        foreach ($strings as $string){
            $contains_uppers = " не";
            if (preg_match("![A-Z|А-Я]!u", $string)) {
                $contains_uppers = "";
            }
            $logger->log("Строка \"$string\"$contains_uppers содержит заглавные буквы.");
        }
    } else {
        echo "Damaged logger was given";
        return;
    }
}