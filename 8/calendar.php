<?php
$month = $_REQUEST['month'];
$date = new DateTime();
date_default_timezone_set('Europe/Moscow');
if($month==="selected") {
    $month = $date->format('m');
    $curDay = $date->format('j');
}
$curDate = $date->setDate(date('Y'), $month, date('d'));
$curMonth = $curDate->format('m');
$beginning = $curDate->setDate(date('Y'), $curMonth, 1);
$step = new DateInterval('P1D');
$period = new DatePeriod($beginning, $step, $curDate->format('t') - 1);
$spaces = $beginning->format('N') - 1;
echo "<style>td{border: 2px solid saddlebrown};</style>";
echo "<table><tbody><tr><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td style='color:red;'>Sat</td><td style='color:red;'>Sun</td>";
echo "</tr><tr>";
for ($i = 0; $i < $spaces; $i++) {
    echo "<td>    </td>";
}
foreach ($period as $datetime) {
    if ((isset($curDay)&&($curDay==$datetime->format('j')))) $font = "bold";
    else $font = "normal";
    if ($datetime->format('N') > 5) {
        echo "<td style='color: red; font-weight: $font'>" . $datetime->format('d') . "</td>";
        if ($datetime->format('N') == 7) {
            echo "</tr><tr>";
        }
    } else echo "<td style='font-weight: $font'>" . $datetime->format('d') . "</td>";
}
echo "</tr></tbody></table>";