<?php

include("form3.html");
if (!isset ($_REQUEST['text'])) {
    return;
}

$text = $_REQUEST['text'];
$strings = explode(PHP_EOL, $text);
for ($i = 0; $i < sizeof($strings); $i++) {
    $arr = explode(" ", $strings[$i]);
    shuffle($arr);
    $strings[$i] = implode(" ", $arr);
}
$all_strings = array_merge($strings, explode( PHP_EOL, $text));

function second_word_comparator ($s1, $s2) {
    return strcmp(explode(" ", $s1)[1], explode(" ", $s2)[1]);
}
uasort($all_strings, 'second_word_comparator');

foreach ($all_strings as $string) {
    echo $string."<br>";
}

?>
