<?php
$code = $_REQUEST['code'];
$input = $_REQUEST['input'];
$output = "";

$cells = [256];
for ($i = 0; $i < sizeof($cells); $i++) {
    $cells[$i] = $i;
}

$arr = [];

echo $code."<br>";

for ($i = 0, $j = 0, $input_index = 0; $i < strlen($code); $i++) {
    echo $code[$i];
    switch ($code[$i]) {
        case ">":
            $j++;
            break;
        case "<":
            $j--;
            break;
        case "+":
            $cells[$j]++;
            break;
        case "-":
            $cells[$j]--;
            break;
        case ".":
            $output .= chr($cells[$j]);
            break;
        case ",":
            if($input)
            $cells[$j] = ord($input[$input_index++]);
            break;
        case "[":
            if ($cells[$j] == 0) {
                $delta = 1;
                while ($delta && $i++ < strlen($code)) {
                    switch ($code[$i]){
                        case "[":
                            $delta++;
                            break;
                        case "]":
                            $delta--;
                            break;
                    }
                }
            }
            else{
                $arr[] = $i;
            }
            break;
        case "]":
            $i = array_pop($arr)-1;
            break;
    }
}

echo $output;

?>
