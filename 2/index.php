<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
$string = $_REQUEST['string'];

function function1(string $s1): string
{
    $output = "";
    $generator = generator($s1);
    foreach ($generator as $ch)
        $output.=$ch;
    return $output." where changed ".$generator->getReturn()." symbols";
}

function generator(string $s)
{
    $changed = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        switch ($s[$i]) {
            case "h":
            {
                $changed++;
                yield "4";
                break;
            }
            case "l":
            {
                $changed++;
                yield "1";
                break;
            }
            case "e":
            {
                $changed++;
                yield "3";
                break;
            }
            case "o":
            {
                $changed++;
                yield "0";
                break;
            }
            default: {
                yield $s[$i];
            }
        }
    }
    return $changed;
}

echo function1($string);
} else {
    include("form2.html");
}

?>
