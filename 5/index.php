<?php

include("form5.html");

if (!isset ($_REQUEST['password'])) {
    return;
}

$password = $_REQUEST['password'];

if (check($password) === "correct") echo "<h1 style='color: green'>Пароль корректный</h1>";
else echo "<h3 style='color:red'>" . check($password) . "</h3>";

function check($word): string
{
    if(!preg_match("/.{10,}/", $word)) return "Пароль должен быть 10 символов или длиннее";
    else if (!preg_match("/.*[a-z].*[a-z].*/",$word)) return "Пароль должен содержать хотя бы 2 латинских строчных буквы";
    else if (!preg_match("/.*[A-Z].*[A-Z].*/",$word)) return "Пароль должен содержать хотя бы 2 латинских прописных буквы";
    else if (!preg_match("/.*[0-9].*[0-9].*/",$word)) return "Пароль должен содержать хотя бы 2 цифры";
    else if (!preg_match("/.*[%$#_*].*[%$#_*].*/",$word)) return "Пароль должен содержать хотя бы 2 специальных символа: %$#_*";
    else if (preg_match("/.*([a-z]{4,})|([A-Z]{4,})|([0-9]{4,})|([%$#_*]{4,}).*/",$word)) return "Пароль содержит более 3 символов одной категории подряд";
    else return "correct";

}

?>